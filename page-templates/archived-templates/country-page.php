<?php
/**
 * ============== Template Name: Country Page
 *
 * @package ramsbury
 */
get_header();?>

<?php get_template_part('template-parts/page', 'hero');?>

<div class="container">
    
<?php get_template_part('template-parts/text', 'area');?>

<!-- ******************* Main Content Area ******************* -->

<?php

// check if the flexible content field has rows of data
if( have_rows('body_content') ):

     // loop through the rows of data
    while ( have_rows('body_content') ) : the_row();

        if( get_row_layout() == 'call_to_action' ):?>

</div><!--c-->

    <div class="inline-cta mb3">
        
        <div class="container">
            
        	<h2 class="heading heading__md heading__alt-color"><?php the_sub_field('cta_heading');?></h2>
        	
            <a href="<?php the_sub_field('cta_button_target');?>" type="button" class="button button__inline-cta">
            
                <?php the_sub_field('cta_button_text');?><i class="fas fa-angle-right"></i>
            
            </a>
       	        	
        </div><!--c-->

    </div>

<div class="container">
        	        	
        <?php elseif( get_row_layout() == 'content_block' ): ?>

        <div class="row mb3">
 
            <div class="col-6">              
                
                <img src="<?php the_sub_field('image');?>"/>
            
            </div>
 
             
            <div class="col-6">              
                
                <h2 class="heading heading__lg mt0"><?php the_sub_field('heading');?></h2>
                
                <?php the_sub_field('copy');?>
            
            </div>
        
        </div>

        <?php endif;
            endwhile;
            endif;?>

</div><!--c-->

<?php get_footer();?>
