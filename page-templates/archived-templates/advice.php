<?php
/**
 * ============== Template Name: Advice Page
 *
 * @package ramsbury
 */
get_header();?>

<?php get_template_part('template-parts/page', 'hero');?>

<div class="container">

<div class="row mb3">

<div class="col-4">
	
	<?php wp_nav_menu( array( 
    	'theme_location' => 'about-menu', 
    	'container_class' => 'sidebar-menu',
    	'before'            => '<h3 class="heading heading__sm">',
    	'after' => '</h3>'
    	 ) ); 	
    ?>	 
    
    <?php $ctaImage = get_field('image', 'options');?>
    
    <div class="sidebar-cta" style="background-image: url(<?php echo $ctaImage['url']; ?>);">
        
        <h3 class="heading heading__lg heading__light font300 mb0"><?php the_field('headline', 'options');?></h3>
        
        <p class="heading__md heading__light font300 mb0"><?php the_field('copy', 'options');?></p>
        
        <a href="<?php the_field('target', 'options');?>" type="button" class="button mt1 mb1">
            
            <?php the_field( 'button_text', 'options' );?>
            
        </a>
        
    </div>
    
</div>

<div class="col-8">

    <?php if( get_field('download_file') ): ?>
  
        <div class="download">
    
        <a href="<?php the_field('download_file');?>" class="download__icon" download="ramsbury Download"><i class="fas fa-file-alt"></i></a>
        
        <div>
        
            <p class="heading__md font300 mb0"><?php the_field('download_prompt');?></p>
            
            <a href="<?php the_field('download_file');?>" download="ramsbury Download">
              
              <h4 class="heading heading__xs font200 mt0 mb2">Download</h4>
            
            </a>
        
        </div>
    
    </div>

    <?php endif; ?>

    <div class="body-copy">
      
      <?php the_field('body_copy');?>
        
    </div>

<!--FAQ CONTENT-->
<div class="toggle-wrapper">
<?php if( have_rows('faq') ): 	
    $i = 0; 
		while ( have_rows('faq') ) : the_row(); 
    $i++;?>
    
<div class="toggle mb2">

  <div class="toggle__question" role="tab">    
      <p class="headingSupporting headingSupporting__sm">
        <span class="headingSupporting__lightWeight">Q<?php echo $i; ?></span>
        <?php the_sub_field('question'); ?>
        <i class="fas fa-times close-toggle"></i>
      </p>
  </div>

  <div class="toggle__answer" role="tabpanel">
    <p><?php the_sub_field('answer'); ?></p>
  </div>

</div>
		
<?php 
  $tCount = $i;
  endwhile; 
  endif;
?>
</div><!--togglewrapper-->

    
</div>


</div><!--r-->

</div><!--c-->


<?php get_footer();?>
