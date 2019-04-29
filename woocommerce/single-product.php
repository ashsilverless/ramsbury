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

<!-- ******************* Our Products Range ******************* -->

<div class="container pt3">

    <h2 class="heading heading__lg text-center mb1">Our Range</h2>

    <div class="row">

	<?php
		$args = array(
			'post_type' => 'product',
			'posts_per_page' => -1
			);
		$loop = new WP_Query( $args );
		if ( $loop->have_posts() ) {
			while ( $loop->have_posts() ) : $loop->the_post();
				if( $loop->post->ID != 1745):

            ?><div class="col-3 mb3">
                <?php get_template_part('template-parts/product', 'card');
?>
            </div><?php
	            endif;
			endwhile;
		} else {
			echo __( 'No products found' );
		}
		wp_reset_postdata();
	?>

    </div><!--r-->

</div><!--c-->

<!-- ******************* Our Products Range END ******************* -->

<!-- ******************* Find A Pint CTA ******************* -->

<?php $findCTAImage = get_field('find_image', 'options');?>

<div class="find-cta" style="background-image: url(<?php echo $findCTAImage['url']; ?>); ">
 
    <div class="content">   
    
        <h2 class="heading heading__lg"><?php  the_field('find_headline', 'options');?></h2>
        
        <a href="" class="button">Search Stockists</a>        
    
     </div>

    <?php for ($x = 0; $x <= 5; $x++) {
        get_template_part('template-parts/beer', 'glass');
    } ?>

</div>

<!-- ******************* Find A Pint CTA END******************* -->

<!-- ******************* Brewsery and Tours CTA ******************* -->

<div class="container-fluid pl0 pr0">
    <div class="row no-gutters">
        
        <div class="col-6">
            
            <?php $breweryCTAImage = get_field('brewery_image', 'options');?>
            
            <div class="inline-cta" style="background-image: url(<?php echo $breweryCTAImage['url']; ?>); ">
            
                <?php get_template_part('template-parts/ramsbury', 'logo');?>    
            
            <div class="content">
            
                <h2 class="heading heading__lg heading__light"><?php  the_field('brewery_headline', 'options');?></h2>
                
                <p class="mb2"><?php  the_field('brewery_copy', 'options');?></p>
            </div>
            <div>
                <a href="" class="button"><?php  the_field('brewery_button_text', 'options');?></a>        
            
            </div>
            
            </div>            
        
        </div><!--col-->

        <div class="col-6">

            <?php $tourCTAImage = get_field('tour_image', 'options');?>

            <div class="inline-cta" style="background-image: url(<?php echo $tourCTAImage['url']; ?>); ">

                <?php get_template_part('template-parts/ramsbury', 'logo');?>    
            
            <div class="content">
            
                <h2 class="heading heading__lg heading__light"><?php  the_field('tour_headline', 'options');?></h2>
                
                <p class="mb2"><?php  the_field('tour_copy', 'options');?></p>
                   </div>
                   <div>
                <a href="" class="button"><?php  the_field('tour_button_text', 'options');?></a>  
                   </div>      
            
         
            
            </div>  

        </div><!--col-->        
        
    </div>
    
</div>

<!-- ******************* Brewsery and Tours CTA END******************* -->

<?php get_footer( '' );
