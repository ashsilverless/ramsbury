<?php 
    if( get_field('hero_type') == 'image' ): 
        $heroImage = get_field('hero_background_image');
    elseif ( get_field('hero_type') == 'color' ): 
        $heroColor = get_field('hero_background_colour');
    endif;
?>

<?php 
    if( get_field('hero_type') !== 'slider'):
?>

    <div class="hero mb3 <?php the_field( 'hero_height' );?>" style="background-image: url(<?php echo $heroImage['url']; ?>); background-color: <?php echo $heroColor; ?>;">

    <?php 
        if( get_field('hero_type') == 'video'): ?>
    
        <video autoplay muted loop class="fullscreen-video">
        
            <source src="<?php the_field('hero_video');?>" type="video/mp4">
        
        </video>
    
    <? endif;?>

    <div class="container">
    
        <div class="row">
                
            <div class="hero__content">       
                
                <h1 class="heading heading__sm heading__light font800"><?php the_field( 'hero_sub_heading' );?></h1>            
                <h3 class="heading heading__xl heading__light"><?php the_field( 'hero_heading' );?></h3>
                <h2 class="heading heading__sm heading__light"><?php the_field( 'hero_copy' );?></h2>

                <?php 
                    if( have_rows('button') ): 
                    while ( have_rows('button') ) : the_row(); ?>
                    
                <a href="<?php the_sub_field( 'button_target' );?>" type="button" class="button">
                    
                    <?php the_sub_field( 'button_text' );?>
                
                </a>
                
                <?php endwhile; endif;?>
                
            </div>       
                
        </div>
    
    </div>

    <!--Scroll To Next Section <a href="" class="next-section">Learn More</a>-->
    
</div><!--hero-->

<?php endif;?>

<?php 
    if( get_field('hero_type') == 'slider'):
?>

    <div class="hero hero__carousel mb3 <?php the_field( 'hero_height' );?>">

        <div class="owl-carousel owl-theme carousel">

        <?php if( have_rows('hero_slider') ): while( have_rows('hero_slider') ): the_row();   ?>

            <div class="carousel__item" style="background-image: url(<?php the_sub_field( 'slider_background' );?>);">

            <div class="container">
                
               <h1 class="heading heading__xl heading__light font800"><?php the_sub_field( 'slider_header' );?></h1>            
                
               <h2 class="heading heading__sm heading__light"><?php the_sub_field( 'copy' );?></h2> 

                <?php 
                    if( have_rows('slider_button') ): 
                    while ( have_rows('slider_button') ) : the_row(); ?>
                    
                <a href="<?php the_sub_field( 'button_target' );?>" type="button" class="button">
                    
                    <?php the_sub_field( 'button_text' );?>
                
                </a>
                
                <?php endwhile; endif;?>
                
            </div><!--c-->

            </div>

        <?php endwhile; endif;?>

    </div>
     
    </div><!--hero-carousel-->

<?php endif;?>