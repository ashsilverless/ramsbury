<div class="large-carousel owl-carousel owl-theme"> 
    
	<?php
		$args = array(
			'post_type' => 'product',
			'posts_per_page' => -1
			);
		$loop = new WP_Query( $args );
		if ( $loop->have_posts() ) {
			while ( $loop->have_posts() ) : $loop->the_post();?>
	<?php $productColor = get_field('product_colour');?>		
    <div class="large-carousel__item">

        <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $loop->post->ID ), 'single-post-thumbnail' );?>

        <div class="bottle">
            <img src="<?php  echo $image[0]; ?>" data-id="<?php echo $loop->post->ID; ?>">
        </div>
<div class="content">
    
                        <h2 class="heading heading__xl" style="color: <?php echo $productColor;?>;"><?php the_field('strapline');?></h2>
    
    
 <p class="heading heading__body heading__xs font400 mb1"><?php the_field('abv');?>% ABV</p>

                    <h2 class="heading heading__sm heading__alt heading__caps"><?php the_title();?></h2>

<p><?php the_field('description');?></p>


<a href="<?php the_permalink();?>" class="button" style="background-color: <?php echo $productColor;?>;">Buy Now</a>        
</div>
        
    
    </div>
			
	<?php endwhile;
		}
		wp_reset_postdata();?>

</div>