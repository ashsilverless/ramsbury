<?php
	
function get_availability() {
	
	global $wpdb;
	
	$response = array();
	
	try {
		
	    $product_id = 1637;
	    
	    $date = $_POST["date"];
	    
	    $time = $_POST["time"];
	    
		$now = new DateTime();
		
	    $format = "Y-m-d";
	    
	    $d = DateTime::createFromFormat($format, $date);
		
		// Verify if date and time are correct
		
		if($d && $d->format($format) === $date && $time) {
			
			$variation_id = get_product_variation_id($product_id, $date, $time);
			
			// Check if variation exists
						
			if(!$variation_id) {
			
				create_product_attribute($product_id, $date, $time);
			
				$variation_id = create_product_variation($product_id, $date, $time);
			
			}
			
			$product = wc_get_product($variation_id);
			
			$availability = $product->get_availability()["availability"];
			
			$number = str_replace(" in stock", "", $availability);
			
			$avail_array = array();
			
			$avail_array["quantity"]    = $number;
			
			$avail_array["description"] = $number . " places remaining";
			
			$cost = $product->get_regular_price();
			
			$response["success"]["availability"] = $avail_array;
			
			$response["success"]["cost"] = $cost;
			
		} else {
			
			throw new Exception("Date or time not set");
			
		}
	} catch(\Exception $e) {
		
		$response["error"] = $e;
		
	} finally {
		
	    echo json_encode($response);
	    
	    wp_die();
	}

}
	
function create_product_attribute($product_id, $date, $time) {
	
	$product_attributes = get_post_meta($product_id, '_product_attributes', true);
	
	$dates = array_filter(array_map('trim', explode('|', $product_attributes["date"]["value"])));
	
	$times = array_filter(array_map('trim', explode('|', $product_attributes["time"]["value"])));
	
	if(!in_array($date, $dates)) {
		
		array_push($dates, $date);
		
		$dates = implode(" | ", $dates);

		$product_attributes["date"]["value"] = $dates;
		
		$product_attributes["date"] = array (
            'name'         => 'date',
            'value'        => $dates,
            'position'     => 1,
            'is_visible'   => 1,
            'is_variation' => 1,
            'is_taxonomy'  => 0
        );
	
	}
	
	if(!in_array($time, $times)) {
		
		array_push($times, $time);
		
		$times = implode(" | ", $times);

		$product_attributes["time"]["value"] = $times;
		
		$product_attributes["time"] = array (
            'name'         => 'time',
            'value'        => $times,
            'position'     => 1,
            'is_visible'   => 1,
            'is_variation' => 1,
            'is_taxonomy'  => 0
        );
	
	}
	
	update_post_meta($product_id, '_product_attributes', $product_attributes);
}


function create_product_variation($product_id, $date, $time) {
	
	global $wpdb;
	
	$stock = 0;
	$price = 0;
	
	$tours = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}tour_bookings WHERE time = '$time'");
	
	foreach($tours as $tour) {
		
		if($tour->recurrence == "once") {
		    
		    if($tour->date == $date) {
		    	$stock = $tour->spots;
		    	$price = $tour->cost;
		    }
		    	
	    }
	    else if($tour->recurrence == "weekly") {
		    
		    if(date("w", strtotime($tour->date)) == date("w", strtotime($date))) {
		    	$stock = $tour->spots;
		    	$price = $tour->cost;
		    }
			    
		}    
		else if($tour->recurrence == "monthly") {
		
			if(date("d", strtotime($tour->date)) == date("d", strtotime($date))) {
		    	$stock = $tour->spots;
		    	$price = $tour->cost;
		    }
			    
		}
		
	}
	
	$product = wc_get_product($product_id);

    $variation_post = array(
        'post_title'  => $product->get_title(),
        'post_name'   => 'product-'.$product_id.'-variation',
        'post_status' => 'publish',
        'post_parent' => $product_id,
        'post_type'   => 'product_variation',
        'guid'        => $product->get_permalink()
    );
	
	$variation_id = wp_insert_post($variation_post);
	
	update_post_meta($variation_id, 'attribute_date', $date);
	update_post_meta($variation_id, 'attribute_time', $time);
	update_post_meta($variation_id, '_price', $price);
	update_post_meta($variation_id, '_regular_price', $price);
	update_post_meta($variation_id, '_virtual', 'yes');
	update_post_meta($variation_id, '_downloadable', 'no');
	update_post_meta($variation_id, '_manage_stock', 'yes');
	update_post_meta($variation_id, '_stock', $stock);
	update_post_meta($variation_id, '_stock_status', 'instock');
	
	return $variation_id;

}

function get_product_variation_id($product_id, $date, $time) {
	
	global $wpdb;

    return $wpdb->get_var("
        SELECT p.ID
		FROM {$wpdb->prefix}posts AS p
		JOIN {$wpdb->prefix}postmeta AS pm ON p.ID = pm.post_id
		JOIN {$wpdb->prefix}postmeta AS pm2 ON p.ID = pm2.post_id
		WHERE pm.meta_key = 'attribute_date'
		  AND pm.meta_value LIKE '$date'
		  AND pm2.meta_key = 'attribute_time'
		  AND pm2.meta_value LIKE '$time'
		  AND p.post_parent = $product_id
    ");
}

function get_available_dates() {
	
	global $wpdb;

    $results = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}tour_bookings");
    
    echo json_encode($results);
	    
	wp_die();
}

function get_hours() {
	
	global $wpdb;
	
	$date = $_POST["date"];

    $results = $wpdb->get_results("SELECT date, time, recurrence FROM {$wpdb->prefix}tour_bookings");
    
    $select = '<option value="" disabled selected hidden>Time Slot</option>';
    
    foreach($results as $result) {
	    
	    if($result->recurrence == "once") {
		    
		    if($result->date == $date)
		    	$select .= '<option value="' . $result->time . '">' . date("g:i a", strtotime($result->time)) . '</option>';
		    	
	    }
	    else if($result->recurrence == "weekly") {
		    
		    if(date("w", strtotime($result->date)) == date("w", strtotime($date)))
			    $select .= '<option value="' . $result->time . '">' . date("g:i a", strtotime($result->time)) . '</option>';
			    
		}    
		else if($result->recurrence == "monthly") {
		
			if(date("d", strtotime($result->date)) == date("d", strtotime($date)))
			    $select .= '<option value="' . $result->time . '">' . date("g:i a", strtotime($result->time)) . '</option>';
			    
		}
	    
    }
    
	echo json_encode($select);
	
	    
	wp_die();
}

function add_product_to_cart() {
	
	global $wpdb;
	
	$response = array();
	
	try {
		
	    $product_id = 1637;
	    
	    $date = $_POST["date"];
	    
	    $time = $_POST["time"];
	    
	    $quantity = $_POST["quantity"];
			
		$variation_id = get_product_variation_id($product_id, $date, $time);
		
		$variation = array(
			'date' => $date,
			'time' => $time
		);
		
		$passed_validation = apply_filters( 'woocommerce_add_to_cart_validation', true, $product_id, $quantity );
	    
	    $product_status    = get_post_status( $product_id );
	
	    if ( $passed_validation && WC()->cart->add_to_cart( $product_id, $quantity, $variation_id, $variation ) && 'publish' === $product_status ) {
	
	        do_action('woocommerce_ajax_added_to_cart', $product_id);
	
	        wc_add_to_cart_message( $product_id );
	
	    } else {
	
	        // If there was an error adding to the cart, redirect to the product page to show any errors
	        $data = array(
	            'error'       => true,
	            'product_url' => apply_filters( 'woocommerce_cart_redirect_after_error', get_permalink( $product_id ), $product_id )
	        );
	
	        $response = $data;
	
	    }

	    
		
	} catch(\Exception $e) {
		
		$response["error"] = $e;
		
	} finally {
		
	    echo json_encode($response);
	    
	    wp_die();
	}
}


?>