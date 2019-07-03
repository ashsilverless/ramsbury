<?php
/**
 * Template Name: Checkout Page
 *
 * @package ramsbury
 */
    if ( ! defined( 'ABSPATH' ) ) {
        exit;   // Exit if accessed directly
    }

get_header();?>

<!-- ******************* Hero ******************* -->

<!-- ******************* Hero Content ******************* -->

<?php $heroImage = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' ); ?>

<div class="hero mb3 h75" style="background-image: url(<?php echo $heroImage[0]; ?>);">

    <div class="container">
    
        <div class="row">
                
            <div class="col-12 hero__content text-center">       
                
                <h1 class="heading heading__xl heading__light">
                    
                    <?php if (get_field('hero_heading')):
                        the_field('hero_heading');
                    else:    
                        the_title();
                    endif;?>
                    
                </h1>  
                               
            </div>       
                
        </div>
    
    </div>
    
</div>

<!-- ******************* Hero Content END ******************* -->

<!-- ******************* Hero END ******************* -->

<!-- ******************* Content section ******************* -->
<div class="container">

    <?php echo do_shortcode('[woocommerce_checkout]')?>
    
</div>
    
<?php get_footer();?>