<?php
/**
 * ============== Template Name: Contact Page
 *
 * @package ramsbury
 */
get_header();?>

<div class="dark-block pt10 pb3">

<h1 class="heading heading__xl heading__light text-center">Contact Us</h1>

<div class="container">
    
    <div class="row">
        
        <div class="col-5">
            
            <p class="heading heading__alt heading__caps heading__light mt2"><?php the_field('footer_heading', 'option');?></p>      
            
            <h2 class="heading heading__sm">Shop</h2>
            <p><?php the_field('shop_address', 'option');?></p>             
            <p><?php the_field('shop_telephone', 'option');?></p>  
            <p><?php the_field('shop_email', 'option');?></p>  
            
            <h2 class="heading heading__sm mt2">Estate Office</h2>
            <p><?php the_field('estate_address', 'option');?></p>             
            <p><?php the_field('estate_telephone', 'option');?></p>  
            <p><?php the_field('estate_email', 'option');?></p>              

            <div class="socials mt1">
                    
                <?php if( have_rows('social_links', 'option') ): while( have_rows('social_links', 'option') ): the_row(); ?>
                
                <a href="<?php the_sub_field('page_link'); ?>"><i class="fab fa-<?php the_sub_field('name'); ?>"></i></a>
                
                <?php endwhile; endif; ?>
            
            </div>


            
        </div><!--col-->

        <div class="col-7">
            CONTACT FORM
        </div><!--col-->
        
    </div><!--r-->

<h2 class="heading heading__lg heading__light mt2">Frequently Asked Questions</h2>

<?php get_template_part('template-parts/toggle');?>
    
</div><!--c-->


</div>


<!-- ******************* Map Section ******************* -->

<div style="height:50vh; background:darkgrey">
    MAP BLOCK
</div>

<!-- ******************* Map Section END ******************* -->

<?php get_footer();?>