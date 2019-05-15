<div class="container-fluid pl0 pr0">
    <div class="row no-gutters">
        
        <div class="col-6">
            
            <?php $breweryCTAImage = get_field('brewery_image', 'options');?>
            <?php $breweryCTAVideo = get_field('brewery_video', 'options');?>   
            
            <div class="banner">
            
            <video autoplay loop muted class="banner__video" poster="<?php echo $breweryCTAImage['url']; ?>">
                <source src="<?php echo $breweryCTAVideo['url']; ?>" type="video/mp4">
            </video>
            
            <div class="inline-cta">
            
                <?php get_template_part('template-parts/ramsbury', 'logo');?>    
            
            <div class="content">
            
                <h2 class="heading heading__lg heading__light"><?php  the_field('brewery_headline', 'options');?></h2>
                
                <p class="mb2"><?php  the_field('brewery_copy', 'options');?></p>
            </div>
            <div class="action">
                <a href="" class="button"><?php  the_field('brewery_button_text', 'options');?></a>        
            
            </div>
            
            </div>            
          </div>
        </div><!--col-->

        <div class="col-6">

            <?php $tourCTAImage = get_field('tour_image', 'options');?>
            <?php $tourCTAVideo = get_field('tour_video', 'options');?>   
            
            <div class="banner">
            
            <video autoplay loop muted class="banner__video" poster="<?php echo $tourCTAImage['url']; ?>">
                <source src="<?php echo $tourCTAVideo['url']; ?>" type="video/mp4">
            </video>

            <div class="inline-cta">

                <?php get_template_part('template-parts/ramsbury', 'logo');?>    
            
            <div class="content">
            
                <h2 class="heading heading__lg heading__light"><?php  the_field('tour_headline', 'options');?></h2>
                
                <p class="mb2"><?php  the_field('tour_copy', 'options');?></p>
                   </div>
                   <div class="action">
                <a href="" class="button"><?php  the_field('tour_button_text', 'options');?></a>  
                   </div>      
            
         
            
            </div>  
            </div>
            
        </div><!--col-->        
        
    </div>
    
</div>