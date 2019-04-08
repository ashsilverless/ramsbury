<?php
$params = array('posts_per_page' => 5, 'post_type' => 'product');
$wc_query = new WP_Query($params);
?>
<?php if ($wc_query->have_posts()) : ?>
<?php while ($wc_query->have_posts()) :
                $wc_query->the_post(); ?>
<?php the_title(); ?>

<?php the_field('date_from'); ?>
<?php the_field('date_to'); ?>

	<?php

	/** Product Price **/ 	
	do_action( 'woocommerce_after_shop_loop_item_title' );

	/** Add To Cart Button **/ 	do_action( 'woocommerce_after_shop_loop_item' );
	?>

<?php
    $stock_amount = $product->get_stock_quantity();
    echo $stock_amount;
    

?>



<?php endwhile; ?>
<?php wp_reset_postdata(); ?>
<?php else:  ?>
<p>
     <?php _e( 'No Products'); ?>
</p>
<?php endif; ?>