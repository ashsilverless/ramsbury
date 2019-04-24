<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ramsbury
 */

get_header();
?>

    <div class="container">
    
        <div class="row">
                
            <div class="hero__content">       
                
                <h1 class="heading heading__xl heading__light font800"><?php the_archive_title();?></h1>            
                
            </div>       
                
        </div>
    
    </div>
		
<div id="main" class="content">
 
<div class="container sub-menu-content">

        <div class="row">
	        
	        <div class="col-lg-2 offset-lg-1 col-sm-3 sticky">

				<?php get_template_part( 'template-parts/blog', 'sidebar' );?>	
	        
	        </div>
	        
	        <div class="col-lg-7 offset-lg-1 col-sm-9">
				
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>	        
				 
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
	    	 
	    	 <?php endwhile; wp_reset_postdata(); endif; ?>     
	    	
	    	</div><!--col-7-->

        </div><!--row-->
    </div><!--container-->

<?php get_footer();?>
