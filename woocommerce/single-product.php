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


<!-- ******************* Hero Content ******************* -->

<?php $heroImage = get_field('hero_image');?>

<div class="wrapper-hero wrapper-hero__shallow mb3" style="background-image: url(<?php echo $heroImage['url']; ?>);">

    <div class="container text-center">

        <h1 class="heading heading__xl mb1"><?php the_title();?></h1>         

            <h2 class="heading heading__sm mb1">
                
            <?php 
            if( have_rows('location') ): 
            while ( have_rows('location') ) : the_row(); ?>                  
    
                <span class="location"><?php the_sub_field('locations'); ?></span>            
            <?php endwhile;
            endif;?>      
            
            </h2>


    </div><!--c-->   
</div>

<!-- ******************* Hero Content END ******************* -->


<div class="container">

    <div class="row">
            
        <div class="col-6">       

            <h3 class="heading heading__md mb1">Itinerary</h3>

            <?php 
            if( have_rows('tour_details') ): 
            while ( have_rows('tour_details') ) : the_row(); ?>    

            <p class="font400 mb0"><?php the_sub_field('day'); ?></p>
            <?php the_sub_field('activity'); ?>
            
            <?php endwhile;
            endif;?>   
            
            <a href="/itinerary" class="button button__draw button__meet button__ghost mt1">View Full Itinerary Details</a>
            
            <h3 class="heading heading__md mt2 mb1">Details</h3>
            
            <?php the_field('tour_description');?>
            
        </div>       

        <div class="col-6">      
 
            <div class="booking-panel">
                
                <div class="dashed-line"></div>
                
                <h1 class="heading heading__md font800 mb1"><?php the_title();?></h1>    
                
                <div class="dates">
                    
                    <h3 class="heading heading__sm">Dates</h3> 

                    <p><?php the_field('date_from'); ?> - <?php the_field('date_to'); ?></p>
                
                </div>

                <?php
                $date_from  = get_field( 'date_from' );
                $date_to    = get_field( 'date_to' );
                $date_1     = new DateTime(date('Y-m-d', strtotime($date_from)));
                $date_2     = new DateTime(date('Y-m-d', strtotime($date_to)));
                $days       = $date_1->diff($date_2)->days;?>
            
                <div class="duration">
                    
                    <h3 class="heading heading__sm">Duration </h3>            

                    <p><?php echo $days;?> Days</p>

                </div>

                <?php while ( have_posts() ) : the_post(); ?>
                <?php wc_get_template_part( 'content', 'single-product' ); ?>
            
                <?php endwhile; // end of the loop. ?>            
            
            </div>

            <?php if( have_rows('tour_guides') ): ?>
            
            <h3 class="heading heading__md mt2 mb1">YOUR GUIDES</h3>            
            
            <?php while ( have_rows('tour_guides') ) : the_row(); ?>    
            <div class="tour-guide">
                
                <img src="<?php the_sub_field('guide_image'); ?>"/>
                <p><?php the_sub_field('guide_name'); ?></p>
            </div>
            
            <?php endwhile;
            endif;?>              

            <h3 class="heading heading__md mt2 mb1">IMPORTANT DETAILS</h3>
             
            <div class="exclusions-list">
                
                <?php the_field('exclusions');?>
            
            </div>
            
            <a href="/terms" class="mt1">Full Terms & Conditions <i class="fas fa-angle-right"></i></a>
        </div>

    </div>



	<!--<?php
		/**
		 * woocommerce_before_main_content hook.
		 *
		 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
		 * @hooked woocommerce_breadcrumb - 20
		 */
		do_action( 'woocommerce_before_main_content' );
	?>-->



	<!--<?php
		/**
		 * woocommerce_after_main_content hook.
		 *
		 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
		 */
		do_action( 'woocommerce_after_main_content' );
	?>-->

</div><!--c-->

<?php get_footer( '' );
