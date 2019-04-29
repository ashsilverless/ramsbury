<?php
/**
 * ============== Template Name: Beers Page
 *
 * @package ramsbury
 */
get_header();?>

<!-- ******************* Our Products Range ******************* -->

<div class="container pt10">

    <h2 class="heading heading__lg text-center mb1">Our Beers</h2>

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

<?php $findCTAImage = get_field('find_image', 'options');?>

<div class="find-cta" style="background-image: url(<?php echo $findCTAImage['url']; ?>); ">
 
    <div class="content">   
    
        <h2 class="heading heading__lg"><?php  the_field('find_headline', 'options');?></h2>
        
        <a href="/stockists" class="button">Search Stockists</a>        
    
     </div>

    <?php for ($x = 0; $x <= 5; $x++) {
        get_template_part('template-parts/beer', 'glass');
    } ?>

</div>

<!-- ******************* Find A Pint CTA END******************* -->

<!-- ******************* Brewsery and Tours CTA ******************* -->

<div class="container-fluid pl0 pr0">
    <div class="row no-gutters">
        
        <div class="col-6">
            
            <?php $breweryCTAImage = get_field('brewery_image', 'options');?>
            
            <div class="inline-cta" style="background-image: url(<?php echo $breweryCTAImage['url']; ?>); ">
            
                <?php get_template_part('template-parts/ramsbury', 'logo');?>    
            
            <div class="content">
            
                <h2 class="heading heading__lg heading__light"><?php  the_field('brewery_headline', 'options');?></h2>
                
                <p class="mb2"><?php  the_field('brewery_copy', 'options');?></p>
            </div>
            <div>
                <a href="<?php  the_field('brewery_target', 'options');?>" class="button"><?php  the_field('brewery_button_text', 'options');?></a>        
            
            </div>
            
            </div>            
        
        </div><!--col-->

        <div class="col-6">

            <?php $tourCTAImage = get_field('tour_image', 'options');?>

            <div class="inline-cta" style="background-image: url(<?php echo $tourCTAImage['url']; ?>); ">

                <?php get_template_part('template-parts/ramsbury', 'logo');?>    
            
            <div class="content">
            
                <h2 class="heading heading__lg heading__light"><?php  the_field('tour_headline', 'options');?></h2>
                
                <p class="mb2"><?php  the_field('tour_copy', 'options');?></p>
                   </div>
                   <div>
                <a href="<?php  the_field('tour_target', 'options');?>" class="button"><?php  the_field('tour_button_text', 'options');?></a>  
                   </div>      
            
         
            
            </div>  

        </div><!--col-->        
        
    </div>
    
</div>

<!-- ******************* Brewsery and Tours CTA END******************* -->

<?php get_footer();?>