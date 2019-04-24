<?php get_header();  
/*
/   Default Page Template
/   @package ramsbury
*/ 
?>

<?php if( get_field('hero_height') == 'd-none' ): ?>

    <div class="content no-hero">    
        
    <?php else:?>

    <div class="content has-hero">

<?php endif;?>

<?php if( get_field('hero_background_image') ): 

    get_template_part('template-parts/hero');?>

<?php endif;?>

    <div class="container pt10">
	    
	    <?php if ( have_posts() ) : while ( have_posts() ) : the_post();
		    
			the_content();
			
		endwhile; endif; ?>
      
    </div><!--c-->

</div><!--content-->
 
<?php get_footer(); ?>