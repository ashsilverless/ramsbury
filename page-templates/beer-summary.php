<?php
/**
 * ============== Template Name: Beers Page
 *
 * @package ramsbury
 */
get_header();?>

<!-- ******************* Our Products Range ******************* -->

<div class="container pt10">

    <h2 class="heading heading__lg text-center mt1 mb1">Our Beers</h2>

    <div class="row">

	<?php
		$args = array(
			'post_type' => 'product',
			'posts_per_page' => -1
			);
		$loop = new WP_Query( $args );
		if ( $loop->have_posts() ) {
			while ( $loop->have_posts() ) : $loop->the_post();
				if ( $loop->post->ID != 1745 ):

	            ?><div class="col-3 mb3">
	                <?php get_template_part('template-parts/product', 'card');
	?>
	            </div><?php
		        endif;
			endwhile;
		} else {
			echo __( 'No products found' );
		}
		wp_reset_postdata();
	?>

    </div><!--r-->

</div><!--c-->

<!-- ******************* Our Products Range END ******************* -->

<!-- ******************* Find A Pint CTA ******************* -->

<?php get_template_part('template-parts/find', 'beer');?>

<!-- ******************* Find A Pint CTA END******************* -->

<!-- ******************* Brewsery and Tours CTA ******************* -->

<?php get_template_part('template-parts/brewery', 'tours');?>

<!-- ******************* Brewsery and Tours CTA END******************* -->

<?php get_footer();?>