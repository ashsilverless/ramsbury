<?php
/**
 * ============== Template Name: Tours Page
 *
 * @package ramsbury
 */
get_header();?>

<!-- ******************* Hero Section ******************* -->

<?php get_template_part('template-parts/hero');?>

<!-- ******************* Hero END ******************* -->

<!-- ******************* Tour Section ******************* -->


<div class="container">
    
    <div class="row">
    
        <div class="col-10 offset-1 text-center pt3 pb3 mb3">
                
            <?php the_field('intro_text');?>   
        
        <a href="#book" class="button button__inline">Book Now</a>
        
        </div>

        <div class="col-6">
             
            <h3 class="heading heading__lg">Group Tours</h3>     
            <p><?php the_field('group_tours');?></p>   
        
        </div>
        
        <div class="col-6">
            <h3 class="heading heading__lg">Private Tours</h3>                   
            <p><?php the_field('private_tours');?></p>   
        
        </div>
        
        
    </div><!--r-->
         
</div><!--c-->

<div id="book">
    <?php get_template_part('template-parts/tour-booking');?>
</div>
<!-- ******************* Tour Section END ******************* -->

<!-- ******************* Gallery Section ******************* -->

<?php get_template_part('template-parts/gallery');?>

<!-- ******************* Gallery Section ******************* -->

<!-- ******************* Slider Section ******************* -->

<?php get_template_part('template-parts/large', 'carousel');?>

<!-- ******************* Slider Section END ******************* -->

<?php get_footer();?>