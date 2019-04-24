<?php
/**
 * The template for displaying all single posts
 *
 * @package ramsbury
 */

get_header();
?>

<?php
    while ( have_posts() ) :
	the_post();?>

<!-- ******************* Hero Content ******************* -->

<?php $heroImage = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' ); ?>

<div class="hero mb3 h50" style="background-image: url(<?php echo $heroImage[0]; ?>);">

    <div class="container">
    
        <div class="row">
                
            <div class="col-12 wrapper-hero__content text-center">       
                
                <h1 class="heading heading__xl heading__light font800">
                    
                    <?php if (get_field('hero_heading')):
                        the_field('hero_heading');
                    else:    
                        the_title();
                    endif;?>
                    
                </h1>  
                          
                <h2 class="heading heading__sm heading__light font300">
                    
                    Posted <?php the_date();?>
                
                </h2>
                               
            </div>       
                
        </div>
    
    </div>
    
</div>

<!-- ******************* Hero Content END ******************* -->
 
<div class="container">

    <div class="row">
        
        <div class="col-8">
    
            <article class="news">
        
    			<?php the_content();
    
    			the_post_navigation();
    
    		endwhile; // End of the loop.
    		?>
    
    </article>
    
        </div>
        
        <div class="col-4">

            <?php get_template_part( 'template-parts/blog', 'sidebar' );?>	
            
        </div>
    
        </div>
        
    </div>

<a href="/news" class="button mb3">Back To News</a>

</div><!--c-->

<?php get_footer();
