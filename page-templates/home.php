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

<div class="dark-block text-center pt3 pb2">

<h2 class="heading heading__xl heading__light mb1">Our Beers</h2>

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
        
            <a class="trigger-expand">Read More</a>    
        
        <?php endif; ?>
        
    <div class="expanding-copy__more">
    
        <?php the_field('text_block_text_more'); ?>          
    
    </div>    
    
    <?php if( get_field('text_block_text_more') ): ?>
    
        <a class="trigger-collapse hide">Read Less</a>    
    
    <?php endif; ?>

</div>

        </div><!--col-->
        
    </div><!--r-->
    
</div><!--c-->

<!-- ******************* Intro Text END******************* -->

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

<?php get_footer();?>