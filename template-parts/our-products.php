<div class="container pt3">

    <!--<h2 class="heading heading__lg text-center mb1">Our Range</h2>-->

    <div class="row">

    <h2 class="heading  heading__sm heading__seperator mt1 mb2"><span><?php the_field('first_heading');?></span></h2>

	<?php
		$args = array(
			'post_type' => 'product',
			'product_cat' => 'bottled-beer',
			'posts_per_page' => -1
			);
		$loop = new WP_Query( $args );
		if ( $loop->have_posts() ) {
			while ( $loop->have_posts() ) : $loop->the_post(); ?>
			
			<div class="col-3 mb3 text-center">
                <?php get_template_part('template-parts/product', 'card');
?>
            </div><?php

			endwhile;
		} else {
			echo __( 'No products found' );
		}
		wp_reset_postdata();
	?>

    </div><!--r-->

    <div class="row">

    <h2 class="heading heading__sm heading__seperator mt1 mb0"><span><?php the_field('second_heading');?></span></h2>

	<?php
		$args = array(
			'post_type' => 'product',
			'product_cat' => 'keg-beer',
			'posts_per_page' => -1
			);
		$loop = new WP_Query( $args );
		if ( $loop->have_posts() ) {
			while ( $loop->have_posts() ) : $loop->the_post(); ?>
			
			<div class="col-3 mb3 text-center">
                <?php get_template_part('template-parts/product', 'card');
?>
            </div><?php

			endwhile;
		} else {
			echo __( 'No products found' );
		}
		wp_reset_postdata();
	?>

    </div><!--r-->


</div><!--c-->