<?php if( get_field('gallery_type') == 'single' ): ?>

    <!-- ******************* Standard Gallery  ******************* -->
    
    <div class="row"><!--Gallery Block -->
    
        <div class="col-lg-12">
    
        <?php
        $images = get_field('single_gallery');
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

<?php if( get_field('gallery_type') == 'multi' ): ?> 
    
    <!-- ******************* Filtered Gallery ******************* -->
    
        <div class="filter-gallery" >
    
            <div class="filter-gallery__filter mixitup-camps">
            
                <a class="control <?php if($term->slug == get_queried_object()->slug) { echo ' active'; } ?> filter__item filter__item--root heading heading__sm" data-filter="all">All</a>
            
                <?php 
                    if( have_rows('multiple_gallery') ): 
                    while ( have_rows('multiple_gallery') ) : the_row(); 
                    
                    $images = get_sub_field('multi_gallery');
                    $imageCat = get_sub_field('multi_gallery_category');
                    $imageClass = get_sub_field('multi_gallery_class');
                    $size = 'full'; 
                    
                    if( $imageCat ): ?>
            
                    <a class="control <?php echo $imageClass;?> filter__item heading heading__sm" data-filter=".<?php echo $imageClass;?>">
                        <?php echo $imageCat;?>
                    </a>
            
                    <?php endif; ?>
            
                <?php endwhile; endif;?>
            
            </div>
    
            <div class="filter-gallery__wrapper" data-ref="mixitup-container">
    
                <?php 
                    if( have_rows('multiple_gallery') ): 
                    while ( have_rows('multiple_gallery') ) : the_row(); 
                    
                    $images = get_sub_field('multi_gallery');
                    $imageCat = get_sub_field('multi_gallery_category');
                    $imageClass = get_sub_field('multi_gallery_class');
            
                    if( $images ): 
                    foreach( $images as $image ): ?>
            
                    <a href="<?php echo $image['url']; ?>" class="mix filter-gallery__item <?php echo $imageClass;?> lightbox-gallery"  alt="<?php echo $image['alt']; ?>" style="background-image: url(<?php echo $image['url']; ?>);" data-ref="mixitup-target"></a>
            
                <?php endforeach; endif; ?>
                        
            <?php endwhile; endif;?>
    
            </div>
    
        </div><!--filter-gallery-->
    
    <!-- ******************* Filtered Gallery END ******************* -->
    
<?php endif;?>  
    