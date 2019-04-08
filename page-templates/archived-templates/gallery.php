<?php
/**
 * ============== Template Name: Gallery Page
 *
 * @package ramsbury
 */
get_header();?>

<?php get_template_part('template-parts/page', 'hero');?>

<div class="container">

<!-- ******************* Filtered Gallery ******************* -->

    <div class="filter-gallery" >

        <div class="filter-gallery__filter mixitup-camps">
        
            <a class="control <?php if($term->slug == get_queried_object()->slug) { echo ' active'; } ?> filter__item filter__item--root heading heading__sm" data-filter="all">All</a>
        
            <?php 
                if( have_rows('galleries') ): 
                while ( have_rows('galleries') ) : the_row(); 
                
                $images = get_sub_field('gallery');
                $imageCat = get_sub_field('gallery_category');
                $size = 'full'; 
                
                if( $imageCat ): ?>
        
                <a class="control <?php echo $imageCat;?> filter__item heading heading__sm" data-filter=".<?php echo $imageCat;?>">
                    <?php echo $imageCat;?>
                </a>
        
                <?php endif; ?>
        
            <?php endwhile; endif;?>
        
        </div>

        <div class="filter-gallery__wrapper" data-ref="mixitup-container">

        <?php 
            if( have_rows('galleries') ): 
            while ( have_rows('galleries') ) : the_row(); ?>        
            
            <?php 
            
            $images = get_sub_field('gallery');
            $imageCat = get_sub_field('gallery_category');
            $size = 'full'; 
        
            if( $images ): 
            foreach( $images as $image ): ?>
        
                <a href="<?php echo $image['url']; ?>" class="mix filter-gallery__item <?php echo $imageCat;?> lodge-gallery"  alt="<?php echo $image['alt']; ?>" style="background-image: url(<?php echo $image['url']; ?>);" data-ref="mixitup-target"></a>
        
            <?php endforeach; endif; ?>
                    
        <?php endwhile; endif;?>

        </div>

    </div><!--filter-gallery-->

<!-- ******************* Filtered Gallery END ******************* -->

</div><!--c-->

<script>
    
    mixitup('.filter-gallery');     

</script>

<?php get_footer();?>
