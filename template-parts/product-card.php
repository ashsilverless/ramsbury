<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $loop->post->ID ), 'single-post-thumbnail' );?>


<a href="<?php the_permalink();?>">

<div class="product-card <?php if ( has_term( 'keg-beer', 'product_cat' ) ) {echo 'keg-beer';}?> <?php if ( has_term( 'small-beer', 'product_cat' ) ) {echo 'small-beer';}?>">



    <div class="product-card__image">
        
        <div class="bottle-wrapper">
            <figure>
            <img src="<?php  echo $image[0]; ?>" data-id="<?php echo $loop->post->ID; ?>">
            </figure>
        </div>
        
    </div>

    <div class="product-card__content">

       <h2 class="heading strapline mb0"><?php the_title();?></h2>
       
       <div class="mb1">
       <?php get_template_part('template-parts/accent');?>
       </div>
       
       <h2 class="beer-title heading heading__alt heading__caps"><?php the_field('strapline');?></h2>

        <p class="heading heading__body heading__xs font400 mb1"><?php the_field('abv');?>% ABV</p> 

    </div>

    <!--<a href="<?php the_permalink();?>" class="button" style="background-color: <?php echo $productColor;?>;">Buy Now</a>-->        
    
</div> 

</a>