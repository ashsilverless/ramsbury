<?php
/**
 * ============== Template Name: Home Page
 *
 * @package ramsbury
 */
get_header();?>

<!-- ******************* Hero Section ******************* -->

<?php get_template_part('template-parts/hero');?>

<!-- ******************* Hero END ******************* -->

<!-- ******************* Slider Section ******************* -->

<div id="home-our-beers" class="text-center pt5 pb5">

<h2 class="heading heading__xl mb1">Our Beers</h2>

<?php get_template_part('template-parts/small', 'carousel');?>

</div>

<!-- ******************* Slider Section END ******************* -->

<!-- ******************* Intro Text ******************* -->

<div class="container">
    
    <div class="row text-center">
        
        <div class="col-8 offset-2 pb3">

            <h3 class="heading heading__lg mt1"><?php the_field('heading');?></h3>

            <div class="expanding-copy">

    <div class="expanding-copy__lead">
        
            <?php the_field( 'text_block_text' );?>
        
        </div>
        
        <?php if( get_field('text_block_text_more') ): ?>
        
            <a class="trigger-home trigger-expand">Read More</a>    
        
        <?php endif; ?>
        
    <div class="expanding-copy__more">
    
        <?php the_field('text_block_text_more'); ?>          
    
    </div>    
    
    <?php if( get_field('text_block_text_more') ): ?>
    
        <a class="trigger-home trigger-collapse hide">Read Less</a>    
    
    <?php endif; ?>

</div>

        </div><!--col-->
        
    </div><!--r-->
    
</div><!--c-->

<!-- ******************* Intro Text END******************* -->

<!-- ******************* Brewsery and Tours CTA ******************* -->

<?php get_template_part('template-parts/brewery', 'tours');?>

<!-- ******************* Brewsery and Tours CTA END******************* -->

<?php get_footer();?>