<?php
/**
 * ============== Template Name: TEST Page
 *
 * @package ramsbury
 */
get_header();?>


<?php get_template_part('template-parts/hero');?>

<?php get_template_part('template-parts/gallery');?>

<?php get_template_part('template-parts/heading');?>


<?php if( get_field('gallery_2_gallery_type') == 'single' ): ?>

    <!-- ******************* Standard Gallery  ******************* -->
    
    <div class="row"><!--Gallery Block -->
    
        <div class="col-lg-12">
    
        <?php
        $images = get_field('gallery_2_single_gallery');
        if( $images ): ?>
    
            <div class="gallery">
    
            <?php foreach( $images as $image ): ?>
    
            <a href="<?php echo $image['url']; ?>" class="lightbox-gallery"  alt="<?php echo $image['alt']; ?>" style="background-image: url(<?php echo $image['url']; ?>);"><!--<?php echo $image['caption']; ?>--></a>
    
            <?php endforeach; ?>
    
            </div>
    
        <?php endif; ?>
        
        </div>
    
    </div><!--row-->
    
    <!-- ******************* Standard Gallery END ******************* -->

<?php endif;?>




<?php

// check if the flexible content field has rows of data
if( have_rows('blocks') ):

     // loop through the rows of data
    while ( have_rows('blocks') ) : the_row();

        if( get_row_layout() == 'hero_block' ):

        	get_template_part('template-parts/hero');

        elseif( get_row_layout() == 'toggle_block' ):

        	get_template_part('template-parts/toggle');

        elseif( get_row_layout() == 'gallery_block' ):

        	get_template_part('template-parts/gallery');

        elseif( get_row_layout() == 'text_block' ):

        	get_template_part('template-parts/text', 'block');

        elseif( get_row_layout() == 'heading_block' ):

        	get_template_part('template-parts/heading');

        elseif( get_row_layout() == 'button_block' ):

        	get_template_part('template-parts/button');

        elseif( get_row_layout() == 'content_slider_block' ):

        	get_template_part('template-parts/content', 'slider');

        endif;

    endwhile;

else :

    // no layouts found

endif;

?>

</div><!--c-->

<?php get_footer();?>