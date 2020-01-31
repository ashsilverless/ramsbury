<div class="small-carousel owl-carousel owl-theme mt4">

	<?php
		$args = array(
			'post_type' => 'product',
            'tax_query' => array(
                'relation' => 'OR',
                array(
                    'taxonomy' => 'product_cat',
                    'field' => 'slug',
                    'terms' => 'bottled-beer'
                ),
                array(
                    'taxonomy' => 'product_cat',
                    'field' => 'slug',
                    'terms' => 'cans-beer	'
                ),
),
			'posts_per_page' => -1
			);
        $loop = new WP_Query( $args );
        if ( $loop->have_posts() ) {
        while ( $loop->have_posts() ) : $loop->the_post();
        if( $loop->post->ID != 1745): ?>

    <a href="<?php the_permalink();?>">

        <div class="product-card <?php if ( has_term( 'keg-beer', 'product_cat' ) ) {echo 'keg-beer';}?> <?php if ( has_term( 'small-beer', 'product_cat' ) ) {echo 'small-beer';}?> <?php if ( has_term( 'cans-beer', 'product_cat' ) ) {echo 'cans-beer';}?>">

        <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $loop->post->ID ), 'single-post-thumbnail' );?>

            <div class="bottle-wrapper" style="width:100%;">
                <figure>
                <img src="<?php  echo $image[0]; ?>" data-id="<?php echo $loop->post->ID; ?>">
                </figure>
            </div>

            <h2 class="heading heading__sm"><?php the_title();?></h2>

        </div>

    </a>
	<?php endif;
		endwhile;
		}
		wp_reset_postdata();?>

</div>
