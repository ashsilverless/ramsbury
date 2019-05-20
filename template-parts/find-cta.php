<div class="container-fluid pl0 pr0">
    <div class="row no-gutters">
        
        <div class="col-6">
            
            <?php $bellCTAImage = get_field('bell_image', 'options');?>
            
            <div class="banner">
            
            <div class="inline-cta" style="background:url(<?php echo $bellCTAImage['url']; ?>);">
            
                <?php get_template_part('template-parts/ramsbury', 'logo');?>    
            
            <div class="content">
            
                <h2 class="heading heading__lg heading__light"><?php  the_field('bell_headline', 'options');?></h2>
                
                <p class="mb2"><?php  the_field('bell_copy', 'options');?></p>
            </div>
            <div class="action">
                <a href="<?php  the_field('bell_target', 'options');?>" class="button" target="_blank"><?php  the_field('bell_button_text', 'options');?></a>        
            
            </div>
            
            </div>            
          </div>
        </div><!--col-->

        <div class="col-6">

            <?php $wellyCTAImage = get_field('welly_image', 'options');?>
            
            <div class="banner">
            
            <div class="inline-cta" style="background:url(<?php echo $wellyCTAImage['url']; ?>);">

                <?php get_template_part('template-parts/ramsbury', 'logo');?>    
            
            <div class="content">
            
                <h2 class="heading heading__lg heading__light"><?php  the_field('welly_headline', 'options');?></h2>
                
                <p class="mb2"><?php  the_field('welly_copy', 'options');?></p>
                   </div>
                   <div class="action">
                <a href="<?php  the_field('welly_target', 'options');?>" class="button" target="_blank"><?php  the_field('welly_button_text', 'options');?></a>  
                   </div>      

            </div>  
            </div>
            
        </div><!--col-->        
        
    </div>
    
</div>