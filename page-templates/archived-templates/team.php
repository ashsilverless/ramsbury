<?php
/**
 * ============== Template Name: Team Page
 *
 * @package ramsbury
 */
get_header();?>

<?php get_template_part('template-parts/page', 'hero');?>

<div class="container">
    
    <?php get_template_part('template-parts/text', 'area');?>


    <?php 
    if( have_rows('team_members') ): 
    while ( have_rows('team_members') ) : the_row(); ?>                  
    
    <div class="row mb3">
        
        <div class="col-5 offset-1">
            
            <img src="<?php the_sub_field('team_image'); ?>"/>
        
        </div>

        <div class="col-5">
            
            <h3 class="heading heading__md"><?php the_sub_field('name'); ?></h3>
            
            <h2 class="heading heading__sm heading__alt-color mb1"><?php the_sub_field('sub_heading'); ?></h2>
        
            <div class="expanding-copy">
            
                <div class="expanding-copy__lead">
                    
                    <?php the_sub_field( 'team_copy' );?>
                    
                </div>
            
                <?php if( get_sub_field('team_read_more_copy') ): ?>
                
                    <a class="trigger-expand">Read More</a>    
                
                <?php endif; ?>
            
                <div class="expanding-copy__more">
                    
                    <?php the_sub_field('team_read_more_copy'); ?>          
                    
                </div>    
            
                <?php if( get_sub_field('team_read_more_copy') ): ?>
            
                    <a class="trigger-collapse hide">Read Less</a>    
                
                <?php endif; ?>
                 
            </div>
        
        </div>
      
    </div><!--r-->

    <?php endwhile;
    endif;?>        



<?php get_footer();?>
