<?php
/**
 * Template Name: Blog
 *
 * @package ramsbury
 */
    if ( ! defined( 'ABSPATH' ) ) {
        exit;   // Exit if accessed directly
    }

get_header();?>

<!-- ******************* Hero ******************* -->

<?php get_template_part( 'template-parts/hero');?>	

<!-- ******************* Hero END ******************* -->

<!-- ******************* BLOG section ******************* -->

<div class="container sub-menu-content">

    <div class="row">
    
        <div class="col-lg-2 offset-lg-1 col-sm-3 sticky">
    
    	<?php get_template_part( 'template-parts/blog', 'sidebar' );?>	
    
    </div>
        
        <div class="col-lg-7 offset-lg-1 col-sm-9">
    		
    	<?php
    	    $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
    	    $query = new WP_Query( array(
    	        'posts_per_page' => 5,
    	        'paged' => $paged
    	    ) );
    	?>
    
    	<?php if ( $query->have_posts() ) : ?>
    
    	<?php while ( $query->have_posts() ) : $query->the_post(); ?>
    	
    		<div class="article-card">
    			<?php global $post;
    			$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );?>
    				<a href="<?php echo get_page_link(); ?>">
    				<div class="card-top" style="background-image: url('<?php echo $thumb['0'];?>')"></div>	
    				<div class="card-bottom">
    					<h2><?php the_title(); ?>	</h2>
    					<?php the_date('jS F Y', '<h4>', '</h4>'); ?> 
    					<?php the_excerpt(); ?>	 		
    					<a href="<?php echo get_page_link(); ?>" class="button trans-li med">Read More<span></span></a>				 
    				</div>
    			</a>	 
    		</div>
    	
    	<?php endwhile; ?>
    
    	<div class="pagination">
    	    <?php 
    	        echo paginate_links( array(
    	            'base'         => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
    	            'total'        => $query->max_num_pages,
    	            'current'      => max( 1, get_query_var( 'paged' ) ),
    	            'format'       => '?paged=%#%',
    	            'show_all'     => false,
    	            'type'         => 'plain',
    	            'end_size'     => 2,
    	            'mid_size'     => 1,
    	            'prev_next'    => false,
    	            'add_args'     => false,
    	            'add_fragment' => '',
    	        ) );
    	    ?>
    	</div>
    
    	<?php wp_reset_postdata(); else : endif; ?>
    
    </div>
    
    </div><!--row-->
    
</div><!--container-->
    
<!-- ******************* BLOG section END******************* -->
    
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
                <a href="" class="button"><?php  the_field('brewery_button_text', 'options');?></a>        
            
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
                <a href="" class="button"><?php  the_field('tour_button_text', 'options');?></a>  
                   </div>      
            
         
            
            </div>  

        </div><!--col-->        
        
    </div>
    
</div>

<!-- ******************* Brewsery and Tours CTA END******************* -->    
    
<?php get_footer();?>