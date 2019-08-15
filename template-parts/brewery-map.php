<?php $points = array();
	
$latitude  = get_field('map_marker_latitude',  'options');
$longitude = get_field('map_marker_longitude', 'options');

if($latitude && $longitude):
	
	array_push($points, array(
		'type' => 'Feature',
		'geometry' => array(
			'type' => 'Point',
			'coordinates' => array(
				floatval($longitude),
				floatval($latitude)
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
    
    <!--<h3 class="heading heading__lg">Find Us Here
        <?php get_template_part("template-parts/down", "arrow"); ?>
    </h3>-->
    
	<div id='brewery-map-contact' points='<?php echo json_encode($points);?>'></div>
</div>