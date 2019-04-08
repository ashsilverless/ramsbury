<?php 
    /**
 * ============== Template Name: News Page
 */

get_header();  /* @package ramsbury*/ ?>

<!-- ******************* Hero Content ******************* -->

<?php $heroImage = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' ); ?>

<div class="wrapper-hero mb3" style="background-image: url(<?php echo $heroImage[0]; ?>);">

    <div class="container">
    
        <div class="row">
                
            <div class="col-12 wrapper-hero__content text-center">       
                
                <h1 class="heading heading__xl heading__light font800"><?php the_title();?></h1>            
                <h2 class="heading heading__sm heading__light font300"><?php the_field('sub_headline');?></h2>               
            </div>       
                
        </div>
    
    </div>

    
</div>

<!-- ******************* Hero Content END ******************* -->
 
<div class="container">

<div class="row">
        
        <?php
        while ( have_posts() ) : the_post();
            the_content();
        endwhile;
        ?>

    </div>
  
</div>
 
<?php get_footer(); ?>