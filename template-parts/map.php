<?php if( have_rows('location', 'option') ):
	
	$points = array();
	
	while ( have_rows('location', 'option') ) : the_row();
	
		$json_string = file_get_contents ('https://api.postcodes.io/postcodes/'. preg_replace('/\s/', '', get_sub_field('postcode')));
		
		$json_array = json_decode ($json_string, true);
		
		
		if($json_array["status"] == 200):
		
			$website = trim(get_sub_field('website'), '/');

			if (!preg_match('#^http(s)?://#', $website)) {
			    $website = 'http://' . $website;
			}
			
			$full_direction = get_sub_field('name'). ' ' . get_sub_field('address'). ' ' . get_sub_field('postcode');
			
			$directions = str_replace(array(",",".","|",":"), " ", $full_direction);
			$directions = explode(" ", $directions);
			$directions = implode("+", $directions);
			
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
					'name'       => str_replace('"', "&quot;", str_replace("'", "&apos;", get_sub_field('name'))),
					'address'    => str_replace('"', "&quot;", str_replace("'", "&apos;", get_sub_field('address'))),
					'postcode'   => str_replace('"', "&quot;", str_replace("'", "&apos;", get_sub_field('postcode'))),
					'phone'      => str_replace('"', "&quot;", str_replace("'", "&apos;", get_sub_field('phone'))),
					'website'    => str_replace('"', "&quot;", str_replace("'", "&apos;", $website)),
					'directions' => str_replace('"', "&quot;", str_replace("'", "&apos;", $directions))
				)
			));
	
		endif;
		
	endwhile;
		
endif;?>

<div class="map-wrapper">
	<div id='map-contact' points='<?php echo json_encode($points);?>'></div>
</div>