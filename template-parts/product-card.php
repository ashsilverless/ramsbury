<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $loop->post->ID ), 'single-post-thumbnail' );?>

<div class="product-card">

    <div class="product-card__image">
        
        <div class="bottle-wrapper">
            <img src="<?php  echo $image[0]; ?>" data-id="<?php echo $loop->post->ID; ?>">
        </div>
        
    </div>

    <div class="product-card__content">

       <h2 class="heading strapline"><?php the_field('strapline');?></h2>

        <h2 class="beer-title heading heading__alt heading__caps"><?php the_title();?></h2>

        <p class="heading heading__body heading__xs font400 mb1"><?php the_field('abv');?>% ABV</p> 

    </div>

    <a href="<?php the_permalink();?>" class="button" style="background-color: <?php echo $productColor;?>;">Buy Now</a>        
    
</div>