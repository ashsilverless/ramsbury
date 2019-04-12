<?php
/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header(); ?>

<!-- ******************* Hero Product ******************* -->

<div class="product-hero bottom-border">

<div class="container">

<?php get_template_part('template-parts/large', 'product');?>

</div>

</div>

<!-- ******************* Hero Product END ******************* -->


<div class="container pt3">

<h2 class="heading heading__lg text-center">Our Range</h2>

    <div class="row">

	<?php
		$args = array(
			'post_type' => 'product',
			'posts_per_page' => -1
			);
		$loop = new WP_Query( $args );
		if ( $loop->have_posts() ) {
			while ( $loop->have_posts() ) : $loop->the_post();

            ?><div class="col-3"><?php

            get_template_part('template-parts/product', 'card');
?></div><?php
			endwhile;
		} else {
			echo __( 'No products found' );
		}
		wp_reset_postdata();
	?>


    </div>


</div><!--c-->

<?php get_footer( '' );
