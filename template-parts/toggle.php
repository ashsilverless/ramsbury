<div class="toggle-wrapper">
<?php if( have_rows('toggle') ): 	
    $i = 0; 
		while ( have_rows('toggle') ) : the_row(); 
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