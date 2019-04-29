<?php $productColor = get_field('product_colour');?>

<div class="product-card text-center">

        <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $loop->post->ID ), 'single-post-thumbnail' );?>

        <div class="bottle mb2">
            <img src="<?php  echo $image[0]; ?>" data-id="<?php echo $loop->post->ID; ?>">
        </div>

                    <p class="heading heading__body heading__xs font400 mb1"><?php the_field('abv');?>% ABV</p>

                    <h2 class="beer-title heading heading__sm heading__alt heading__caps"><?php the_title();?></h2>

                    <h2 class="heading heading__sm" style="color: <?php echo $productColor;?>;"><?php the_field('strapline');?></h2>


<a href="<?php the_permalink();?>" class="button" style="background-color: <?php echo $productColor;?>;">Buy Now</a>        
    
</div>