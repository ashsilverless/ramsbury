<?php
/**
 *
 * @package ramsbury
 */
get_header();?>


<!-- ******************* Hero Content ******************* -->

<?php $heroImage = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' ); ?>

<div class="wrapper-hero mb3" style="background-image: url(<?php echo $heroImage[0]; ?>);">

    <div class="container">
    
        <div class="row">
                
            <div class="col-12 wrapper-hero__content text-center">       
                
                <h1 class="heading heading__xl heading__light font800">News</h1>            
                <h2 class="heading heading__sm heading__light font300"></h2>               
            </div>       
                
        </div>
    
    </div>

    
</div>

<!-- ******************* Hero Content END ******************* -->


    <div class="container">

        <div class="row post-summary">
	        


  <?php if (have_posts()) : ?>
   <?php while (have_posts()) : the_post(); ?>
 
 <?php $postImage = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' ); ?>
     
     <div class="post-summary__item">
         
        <a href="<?php the_permalink() ?>" rel="bookmark" title="Link to <?php the_title_attribute(); ?>" class="post-image"><img src="<?php echo $postImage[0];?>"/></a>         
        
        <h2 id="post-<?php the_ID(); ?>" class="heading">

            <a href="<?php the_permalink() ?>" rel="bookmark" title="Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a>
        
        </h2>
     
        <p class="heading heading__xs heading__alt-color font200 mb1"><?php the_date() ?></p> 
        <?php the_excerpt() ?>     
        
        <a href="<?php the_permalink() ?>" rel="bookmark" title="Link to <?php the_title_attribute(); ?>" class="button">Read More</a>  
      </div>
      
    <?php endwhile; ?>

  <?php endif; ?>



        </div><!--row-->
        
    </div><!--container-->
    
    <?php get_footer();?>