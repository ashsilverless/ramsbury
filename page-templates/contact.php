<?php
/**
 * ============== Template Name: Contact Page
 *
 * @package ramsbury
 */
get_header();?>

<div class="bottom-border pt10 pb3">

<h1 class="heading heading__xl text-center pt1">Contact Us</h1>

<div class="container">
    
    <div class="row">
        
        <div class="col-5">
            
            <p class="heading heading__body font700 mt1"><?php the_field('footer_heading', 'option');?></p>      
            
            <!--<h2 class="heading heading__md heading__light">Shop</h2>-->
            <p><?php the_field('shop_address', 'option');?></p>             
            <p><?php the_field('shop_telephone', 'option');?></p>  
            <p><?php the_field('shop_email', 'option');?></p>  
            <!--
            <h2 class="heading heading__sm mt2 contact-subtitle">Estate Office</h2>
            <p><?php the_field('estate_address', 'option');?></p>             
            <p><?php the_field('estate_telephone', 'option');?></p>  
            <p><?php the_field('estate_email', 'option');?></p>     -->         

            <div class="socials mt1">
                    
                <?php if( have_rows('social_links', 'option') ): while( have_rows('social_links', 'option') ): the_row(); ?>
                
                <a href="<?php the_sub_field('page_link'); ?>"><i class="fab fa-<?php the_sub_field('name'); ?>"></i></a>
                
                <?php endwhile; endif; ?>
            
            </div>


            
        </div><!--col-->

        <div class="col-7">
            <?php echo do_shortcode('[contact-form-7 id="1325" title="Contact Form"]'); ?>
        </div><!--col-->
        
    </div><!--r-->

</div><!--c-->

<!-- ******************* Map Section ******************* -->

<div style="height:50vh;" class="top-border mt3">
    <?php get_template_part("template-parts/brewery", "map"); ?>
</div>

<!-- ******************* Map Section END ******************* -->

<div class="container">

<h2 class="heading heading__lg mt2 mb1">Frequently Asked Questions</h2>

<?php get_template_part('template-parts/toggle');?>
    
</div><!--c-->


</div>

<?php get_footer();?>