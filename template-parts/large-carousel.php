<?php
	$args = array(
		'post_type' => 'product',
		'posts_per_page' => -1
		);
	$loop = new WP_Query( $args );
	if ( $loop->have_posts() ) {?>

    <div class="large-carousel owl-carousel owl-theme"> 		
		
		<?php while ( $loop->have_posts() ) : $loop->the_post();
			if( $loop->post->ID != 1745):
		?>
		
        <div class="large-carousel__item <?php if ( has_term( 'keg-beer', 'product_cat' ) ) {echo 'keg-beer';}?> <?php if ( has_term( 'small-beer', 'product_cat' ) ) {echo 'small-beer';}?>">

            <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $loop->post->ID ), 'single-post-thumbnail' );?>

            <div class="bottle">
                <img src="<?php  echo $image[0]; ?>" data-id="<?php echo $loop->post->ID; ?>">
            </div>

            <div class="content">
    
                <h2 class="heading heading__xl mb0"><?php the_title();?></h2>
    
                <div class="mb1">    

                    <?php get_template_part('template-parts/accent');?>
                    
                </div>
                
                <p class="heading heading__body heading__xs font400 mb1"><?php the_field('abv');?>% ABV</p>

                <h2 class="heading heading__sm heading__alt heading__caps"><?php the_field('strapline');?></h2>

                <p><?php the_field('description');?></p>

                <a href="<?php the_permalink();?>" class="button button__inline">Buy Now</a>        

            </div>
    
    </div>
			
	<?php 
			endif;
		endwhile;
		}
		wp_reset_postdata();?>

</div>