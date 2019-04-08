<?php
/**
 * ============== Template Name: Itineraries Page
 *
 * @package ramsbury
 */
get_header();?>

<?php get_template_part('template-parts/page', 'hero');?>

<div class="container">
    
    <?php get_template_part('template-parts/text', 'area');?>

    <?php 
    if( have_rows('daily_activities') ): 
    while ( have_rows('daily_activities') ) : the_row(); ?>                  
    
    <div class="row mb3">
        
        <div class="col-6">
            
            <img src="<?php the_sub_field('image'); ?>"/>
        
        </div>

        <div class="col-6">
            
            <h3 class="heading heading__md"><?php the_sub_field('day'); ?> | <?php the_sub_field('location'); ?></h3>
            
            <h2 class="heading heading__sm heading__alt-color mb1"><i class="fas fa-map-marker-alt"></i> <?php the_sub_field('lat'); ?>, <?php the_sub_field('long'); ?></h2>
        
            <div class="expanding-copy">
            
                <div class="expanding-copy__lead">
                    
                    <?php the_sub_field( 'lead_copy' );?>
                    
                </div>
            
                <?php if( get_sub_field('read_more_copy') ): ?>
                
                    <a class="trigger-expand">Read More</a>    
                
                <?php endif; ?>
            
                <div class="expanding-copy__more">
                    
                    <?php the_sub_field('read_more_copy'); ?>          
                    
                </div>    
            
                <?php if( get_sub_field('read_more_copy') ): ?>
            
                    <a class="trigger-collapse hide">Read Less</a>    
                
                <?php endif; ?>
                 
            </div>
        
        </div>
      
    </div><!--r-->

    <?php endwhile;
    endif;?>         

    <div class="row mb2">

        <div class="col-6 text-right">
            
            
        
        </div>

        <div class="col-6">
            
            <h3 class="heading heading__md"><?php the_field('subsequent_days_heading'); ?></h3>
            
            <?php the_field('subsequent_days_copy'); ?>
            
        </div>

    </div><!--r-->





<div class="tabs">
	
	<div class="tabs__top">
		
		<div class="container">
			
			<div class="row">
			    
			    <?php if( have_rows('subsequent_locations') ): ?>
			
                <ul class="nav justify-content-center" id="myTab" role="tablist">
				
				<?php $row = 1; // number rows ?>
				
				<?php while( have_rows('subsequent_locations') ): the_row(); ?>
				
    				<li role="presentation" class="<?php if($row == 1) {echo 'active';}?> nav-item">
    					
    					<a href="#<?php echo $row; ?>" role="tab" data-toggle="tab" class="nav-link <?php if($row == 1) {echo 'active';}?>">
    
    						<h2 class="heading heading__sm font400 heading__alt-color mb0"><?php the_sub_field('location_title'); ?></h2>
    
    					</a>
    					
    				</li>
				
				<?php $row++; endwhile; // (have_rows('tab_panes') ):?>
			
                </ul>
			
                <?php endif; // (have_rows('tab_panes') ): ?>
			
            </div><!--row-->
	
        </div><!--container-->

    </div><!--top section-->

	<div class="tabs__bottom">

		<div class="container">	
			
		    <?php if( have_rows('subsequent_locations') ): ?>
		
			<div class="tab-content" id="myTabContent">
				
			    <?php $row = 1; // number rows ?>
			
			    <?php while( have_rows('subsequent_locations') ): the_row(); ?>
			
				<div class="tab-pane fade show <?php if($row == 1) {echo 'active';}?>" id="<?php echo $row; ?>" role="tabpanel">

                    <?php if( have_rows('daily_activities') ): while( have_rows('daily_activities') ): the_row();?>	
                    
                    <div class="row">                        

                        <div class="col-6">
                            
                        <?php 
                        
                        $images = get_sub_field('image');
                        $size = 'full'; // (thumbnail, medium, large, full or custom size)
                        
                        if( $images ): ?>
                         
                            <?php foreach( $images as $image ): ?>
                     
                            	<?php echo wp_get_attachment_image( $image['ID'], $size ); ?>
                    
                            <?php endforeach; ?>
                        
                        <?php endif; ?>
                            
                        </div>

                        <div class="col-6">
                            
                            <div class="sidebar sticky">
                            
                                <h3 class="heading heading__md"><?php the_sub_field('day'); ?> | <?php the_sub_field('location'); ?></h3>
                                
                                <h2 class="heading heading__sm heading__alt-color mb1"><i class="fas fa-map-marker-alt"></i> <?php the_sub_field('lat'); ?>, <?php the_sub_field('long'); ?></h2>
                                
                                <?php the_sub_field('copy'); ?>
                            
                            </div>
                            
                        </div>
                    
                    </div><!--row-->
                    
                    <?php endwhile; endif;?>

                </div>
                
                    <?php $row++; endwhile; // (have_rows('tab_panes') ):?>
                
                </div>
            
                <?php endif; // (have_rows('tab_panes') ): ?>
            
            </div>
            
        </div>
    
    </div><!--bottom section-->

</div>  









































</div><!--c-->

<?php get_footer();?>
