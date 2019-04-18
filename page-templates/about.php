<?php
/**
 * ============== Template Name: About Page
 *
 * @package ramsbury
 */
get_header();?>

<!-- ******************* Hero Section ******************* -->

<?php get_template_part('template-parts/hero');?>

<!-- ******************* Hero END ******************* -->

<!-- ******************* Tour Leader ******************* -->

<div class="dark-block pt5">

    <div class="container">
    
        <div class="row">

        <?php if( have_rows('tour_leader') ): 
            while ( have_rows('tour_leader') ) : the_row(); 
            $leaderImage = get_sub_field('image');?>
                
            <div class="col-6">

                <div class="leader__item mb5" style="background-image: url(<?php echo $leaderImage['url']; ?>);">

                   <h2 class="heading heading__md heading__light"> <?php the_sub_field('image_heading');?></h2>
                   
                   <?php the_sub_field('image_copy');?>
                    
                    <a href="<?php the_sub_field( 'button_target' );?>" type="button" class="button"><?php the_sub_field( 'button_text' );?></a>
               
                </div><!--leader item-->
               
            </div><!--col-->            

            <div class="col-6">
                
               <h2 class="heading heading__lg heading__light"> <?php the_sub_field('heading');?></h2>                

               <?php get_template_part('template-parts/text', 'block');?>
                
            </div><!--col-->    

<?php endwhile; endif;?>
 
        </div><!--r-->
    
<!-- ******************* Tour Leader END ******************* -->

<!-- ******************* Process Section ******************* -->

       <h2 class="heading heading__lg heading__light text-center mb1">Process</h2>   

        <?php if( have_rows('process') ): 
            while ( have_rows('process') ) : the_row();?>



        <div class="row process__item mb3">
            
            <div class="col-5">
            
            <img src="<?php the_sub_field( 'image' );?>"/>
            
            </div><!--col-->  

            <div class="col-1">
            
                <img src="<?php the_sub_field( 'icon' );?>"/>            
            
            </div><!--col-->              

            <div class="col-6">
            
                <h3 class="heading heading__sm heading__light heading__body heading__caps font300 mb1"><?php the_sub_field( 'heading' );?></h3>               
                
                <?php the_sub_field( 'copy' );?>
            
            </div><!--col-->   
                          
        </div><!--r-->

        <?php endwhile; endif;?>

    </div><!--c-->
    
</div><!--dark-->

<!-- ******************* Process Section END ******************* -->

<!-- ******************* Cycle Section ******************* -->

<div class="light-block pt5 pb5">

    <div class="container">
    
            <div class="row">
    
            <?php if( have_rows('cycle_of_beer') ): 
                while ( have_rows('cycle_of_beer') ) : the_row();?>
                    
                <div class="col-8 offset-2">
                
                    <h2 class="heading heading__lg mb1 text-center"><?php the_sub_field( 'heading' );?></h2> 
                    
                    <?php the_sub_field( 'copy' );?>                                       
                
                </div><!--col-->

                <div class="col-12">
                        
                    <img src="<?php the_sub_field( 'image' );?>" class="mt2"/>  
    
                </div><!--col-->
                
            <?php endwhile; endif;?>    
            
            </div><!--r-->
            
    </div><!--c-->

</div><!--light-->

<!-- ******************* Cycle Section END******************* -->

<!-- ******************* Slider Section ******************* -->

<?php get_template_part('template-parts/large', 'carousel');?>

<!-- ******************* Slider Section END ******************* -->

<!-- ******************* Map Section ******************* -->

<div style="height:75vh; background:darkgrey">
    MAP BLOCK
</div>

<!-- ******************* Map Section END ******************* -->

<?php get_footer();?>