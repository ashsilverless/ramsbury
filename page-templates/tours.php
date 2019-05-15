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

<div class="dark-block">

<div class="container">
    
    <div class="row">
    
        <div class="col-10 offset-1 text-center pt3 pb3 mb3">
                
            <?php the_field('intro_text');?>   
        
        <a href="#book" class="button button__inline">Book Now</a>
        
        </div>

        <div class="col-6">
             <div class="emphasis-block">
            <h3 class="heading heading__lg heading__light">Group Tours</h3>     
            <p><?php the_field('group_tours');?></p>   
             </div>
        </div>
        
        <div class="col-6">
            <div class="emphasis-block">
            <h3 class="heading heading__lg heading__light">Private Tours</h3>                   
            <p><?php the_field('private_tours');?></p>   
            </div>
        </div>
        
        
    </div><!--r-->
         
</div><!--c-->

<div class="container">

<div id="book">
    <?php get_template_part('template-parts/tour-booking');?>
</div>

</div>

</div>

<!-- ******************* Tour Section END ******************* -->

<!-- ******************* Gallery Section ******************* -->

<?php get_template_part('template-parts/gallery');?>

<!-- ******************* Gallery Section ******************* -->

<!-- ******************* Slider Section ******************* -->

<?php get_template_part('template-parts/large', 'carousel');?>

<!-- ******************* Slider Section END ******************* -->

<?php get_footer();?>