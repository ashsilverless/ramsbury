<div class="small-carousel owl-carousel owl-theme"> 
    
	<?php
		$args = array(
			'post_type' => 'product',
			'posts_per_page' => 12
			);
		$loop = new WP_Query( $args );
		if ( $loop->have_posts() ) {
			while ( $loop->have_posts() ) : $loop->the_post();?>

<a href="<?php the_permalink();?>">			
    <div class="small-carousel__item">

        <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $loop->post->ID ), 'single-post-thumbnail' );?>

        <div class="bottle">
            <img src="<?php  echo $image[0]; ?>" data-id="<?php echo $loop->post->ID; ?>">
        </div>

        <h2 class="heading heading__sm"><?php the_title();?></h2>
        
    
    </div>
</a>
	<?php endwhile;
		}
		wp_reset_postdata();?>

</div>

