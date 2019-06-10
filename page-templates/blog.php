<?php
/**
 * Template Name: Blog Page
 *
 * @package ramsbury
 */
    if ( ! defined( 'ABSPATH' ) ) {
        exit;   // Exit if accessed directly
    }

get_header();?>

<!-- ******************* Hero ******************* -->

<!-- ******************* Hero Content ******************* -->

<?php get_template_part('template-parts/hero');?>

<!-- ******************* Hero Content END ******************* -->

<!-- ******************* Hero END ******************* -->

<!-- ******************* Content section ******************* -->

<div class="bottom-border pt3 pb3">

    <div class="container">
    
        <div class="row">

            <div class="col-12">
                
                <div class="post-summary">
                                    
                                    <?php 
                                    $args = array (
                                    	'post_type'              => 'post',
                                    	'category_name' => 'featured-article',
                                    	'posts_per_page'         => '1',
                                    'offset' => 0,
                                    );
                                    
                                    // The Query
                                    $query = new WP_Query( $args );
                                    
                                    // The Loop
                                    if ( $query->have_posts() ) {
                                    	while ( $query->have_posts() ) {
                                    		$query->the_post();?>
                                    
                                    <?php $postImage = get_field('summary_image'); ?>
                             
                                    <div class="post-summary__item featured">
                                 
                            <a href="<?php the_permalink() ?>" rel="bookmark" title="Link to <?php the_title_attribute(); ?>" class="post-image" style="background-image: url(<?php echo $postImage['url']; ?>);"></a>         
                                        
                                        <div>
                                        
                                        <a href="<?php the_permalink() ?>" rel="bookmark" title="Link to <?php the_title_attribute(); ?>">
                                            <h2 id="post-<?php the_ID(); ?>" class="heading heading__lg">
                                
                                            <?php the_title(); ?>
                                        
                                        </h2>
                                        </a>
                                     
                                        <p class="heading heading__xs heading__body font200 mb1"><?php the_date() ?></p> 
                                        <?php the_excerpt() ?>     
                                        
                                        <a href="<?php the_permalink() ?>" rel="bookmark" title="Link to <?php the_title_attribute(); ?>" class="button">Read More</a>     
                              </div>
                                    </div>
                        
                                    <?php 	}
                                    } else {
                                    	// no posts found
                                    }
                                    // Restore original Post Data
                                    wp_reset_postdata();?>
                        
                                </div>
                
            </div>
            
            <div class="col-8">
            
                <div class="post-summary">
                        
                        <?php 
                        $args = array (
                        	'post_type'              => 'post',
                        	'category_name' => 'news',
                        	'cat' => '-128',
                        	'posts_per_page'         => '-1',
                        'offset' => 0,
                        );
                        
                        // The Query
                        $query = new WP_Query( $args );
                        
                        // The Loop
                        if ( $query->have_posts() ) {
                        	while ( $query->have_posts() ) {
                        		$query->the_post();?>
                        
                        <?php $postImage = get_field('summary_image'); ?>
                 
                        <div class="post-summary__item">
                     
                            <a href="<?php the_permalink() ?>" rel="bookmark" title="Link to <?php the_title_attribute(); ?>" class="post-image" style="background-image: url(<?php echo $postImage['url']; ?>);"></a>         
                            
                            <a href="<?php the_permalink() ?>" rel="bookmark" title="Link to <?php the_title_attribute(); ?>">
                                <h2 id="post-<?php the_ID(); ?>" class="heading heading__md"><?php the_title(); ?></h2>
                            </a>
                         
                            <p class="heading heading__xs heading__alt-color font200 mb1"><?php the_date() ?></p> 
                            <?php the_excerpt() ?>     
                            
                            <a href="<?php the_permalink() ?>" rel="bookmark" title="Link to <?php the_title_attribute(); ?>" class="button">Read More</a>          
                  
                        </div>
            
                        <?php 	}
                        } else {
                        	// no posts found
                        }
                        // Restore original Post Data
                        wp_reset_postdata();?>
            
                    </div>
            
            </div>
            
            <div class="col-4">
                
                <!--BREWERY CTA IN HERE -->
                
                <!--<div class="month-archives">
                    <?php wp_get_archives('type=monthly'); ?>
                </div>-->
                
            </div>
            
        </div>
    
    </div>

</div>
    
<?php get_footer();?>