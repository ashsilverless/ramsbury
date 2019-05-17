<?php $points = array();
		$json_string = file_get_contents ('https://api.postcodes.io/postcodes/'.get_field('map_marker', 'options'));
		
		$json_array = json_decode ($json_string, true);
		
		
		if($json_array["status"] == 200):
		
			$website = 'https://this.com';
			
			$full_direction = get_field('shop_address', 'options');
			
			$directions = $full_direction;
			
			
			array_push($points, array(
				'type' => 'Feature',
				'geometry' => array(
					'type' => 'Point',
					'coordinates' => array(
						$json_array["result"]["longitude"],
						$json_array["result"]["latitude"]
					)
				),
				'properties' => array(
					'address'    => get_field('shop_address', 'options'),
					'phone'      => get_field('shop_telephone', 'options')
				)
			));
	
		endif;
?>

<div class="map-wrapper">
    
    <h3 class="heading heading__lg">Find Us Here
        <?php get_template_part("template-parts/down", "arrow"); ?>
    </h3>
    
	<div id='brewery-map-contact' points='<?php echo json_encode($points);?>'></div>
</div>