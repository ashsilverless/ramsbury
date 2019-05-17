<div class="small-carousel owl-carousel owl-theme mt2"> 
    
	<?php
		$args = array(
			'post_type' => 'product',
			'product_cat' => 'bottled-beer',
			'posts_per_page' => -1
			);
        $loop = new WP_Query( $args );
        if ( $loop->have_posts() ) {
        while ( $loop->have_posts() ) : $loop->the_post();
        if( $loop->post->ID != 1745): ?>

    <a href="<?php the_permalink();?>">		
    	
        <div class="product-card <?php if ( has_term( 'keg-beer', 'product_cat' ) ) {echo 'keg-beer';}?> <?php if ( has_term( 'small-beer', 'product_cat' ) ) {echo 'small-beer';}?>">

        <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $loop->post->ID ), 'single-post-thumbnail' );?>

            <div class="bottle-wrapper">
                <img src="<?php  echo $image[0]; ?>" data-id="<?php echo $loop->post->ID; ?>">
            </div>

            <h2 class="heading heading__sm"><?php the_title();?></h2>

        </div>

    </a>
	<?php endif;
		endwhile;
		}
		wp_reset_postdata();?>

</div>

