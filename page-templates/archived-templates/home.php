<?php
/**
 * ============== Template Name: Home
 *
 * @package ramsbury
 */
get_header();?>

<!-- ******************* Hero Content ******************* -->

<?php $heroImage = get_field('background_image');?>

<div class="home wrapper-hero mb3" style="background-image: url(<?php echo $heroImage['url']; ?>);">

    <div class="container">
    
        <div class="row">
                
            <div class="col-6 offset-6 wrapper-hero__content">       
                
                <h1 class="heading heading__sm heading__light font800"><?php the_field( 'pre_hero_heading' );?></h1>            
                <h3 class="heading heading__xl heading__light"><?php the_field( 'hero_heading' );?></h3>
                <h2 class="heading heading__sm heading__light"><?php the_field( 'hero_copy' );?></h2>
               
                    <a href="#tickets" type="button" class="button button__prompt mt3">
                        
                        <?php the_field( 'text' );?><i class="fas fa-angle-right"></i>
                        
                        <span class="button__supporting"><?php the_field( 'supporting_text' );?></span>
                        
                    </a>
            
            </div>       
                
        </div>
    
    </div>

    <a href="#nepal" class="next-section">Learn More</a>
    
</div>

<!-- ******************* Hero Content END ******************* -->

<div class="container">

<!-- ******************* Text Area ******************* -->

<div class="text-area mb3">

    <div class="row">

        <div class="col-5 offset-1">
            
            <div class="text-area__one">
           
            <?php if( get_field('text_area_1') == 'Quote' ): ?>
            
                <div class="pull-quote">
                    
                    <?php the_field( 'quote' );?>     
                    <?php the_field( 'attribute' );?>
                    
                </div>
                
            <?php else:?>
               
               <?php the_field( 'ta1_heading' );?>    
            
            <?php endif;?>
            
            </div>
    
        </div>
   
        <div class="col-5">
            
            <div class="text-area__two">
                
                <h2 class="heading heading__lg"><?php the_field( 'ta2_heading' );?></h2>

                <div class="expanding-copy">
            
                <div class="expanding-copy__lead">
                    
                    <?php the_field( 'lead_copy' );?>
                    
                </div>
            
                <?php if( get_field('read_more') ): ?>
                
                    <a class="trigger-expand">Read More</a>    
                
                <?php endif; ?>
            
                <div class="expanding-copy__more">
                    
                    <?php the_field('read_more'); ?>          
                    
                </div>    
            
                <?php if( get_field('read_more') ): ?>
            
                    <a class="trigger-collapse hide">Read Less</a>    
                
                <?php endif; ?>
                 
            </div>

            </div>
        
        </div>
        
    </div><!--r-->

</div>

<!-- ******************* Text Area END ******************* -->

<!-- ******************* Learn More ******************* -->
<div id="nepal"></div>

<div class="learn-more mb3">

    <div class="row">
    
        <div class="col-10 offset-1">
            
            <?php $learnImage = get_field('learn_more_image');?>           
           
           <div class="overlapped-image">
               
               <img src="<?php echo $learnImage['url']; ?>"/>
               
           </div>        
           
        </div>
 
    </div><!--r-->

    <div class="row"> 
        
        <div class="col-8 offset-2">
            
            <div class="learn-more__content">   

                <?php get_template_part( 'template-parts/nepal', 'map');?> 

                <div class="copy">
                    
                    <h2 class="heading heading__lg"><?php the_field( 'learn_more_heading' );?></h2>
                    
                    <?php the_field( 'learn_more_copy' );?>
                
                    <a href="<?php the_field( 'button_target' );?>" type="button" class="button mt1 mb1"><?php the_field( 'button_text' );?></a>
                
                </div>
            
            </div>
        
        </div>
       
    </div><!--r-->

</div>

<!-- ******************* Learn More END ******************* -->

<!-- ******************* Product Summary ******************* -->

<div id="tickets"></div>

<h3 class="heading heading__lg mb1">Upcoming Courses</h3>

<div class="row mb3">      

    <div class="col-12">      
    
    <?php
    $params = array(
    'posts_per_page' => 3, 
    'post_type' => 'product',
    'orderby' => 'date',
    'order'   => 'ASC',
    );
    $wc_query = new WP_Query($params);
    
    if ($wc_query->have_posts()) : 
        while ($wc_query->have_posts()) :
            $wc_query->the_post(); ?>     
     
        <div class="ticket">                
                
            <div class="ticket__title">
                
                <h3 class="heading heading__md font800"><i class="far fa-calendar-alt"></i> <?php the_title(); ?></h3>
            
            </div>
            
            <div class="ticket__places"><?php $stock_amount = $product->get_stock_quantity();?>
                
                <h4 class="heading heading__xl font200 mb0"><?php echo $stock_amount; ?></h4>
                
                <p class="heading heading__xs font200 inline">Places Available</p>

            </div>              

            <div class="ticket__empty">
                
                <p class="mb0">Secure your place with a deposit of just</p>   
                
            </div>
 
            <div class="ticket__from">
                
                <h4 class="heading heading__sm font400 mb0">From</h4>
                
                <p class="mb0"><?php the_field('date_from'); ?></p>
                
            </div>   
                  
            <div class="ticket__to">
                
                <h4 class="heading heading__sm font400 mb0">To</h4>
                
                <p class="mb0"><?php the_field('date_to'); ?></p>    
            
            </div>
                
             <div class="ticket__cost">
                
                <h4 class="heading heading__sm font400 mb0">Prices From</h4>
                
                <p class="mb0">£999 <span class="heading heading__light font200">*</span></p>    
            
            </div>                  

            <div class="ticket__location">
                
                <p class="mb0"><span class="heading heading__xs font400 mb0">Visiting:</span> 
                    
                <?php 
                if( have_rows('location') ): 
                while ( have_rows('location') ) : the_row(); ?>                  

                    <span class="location"><?php the_sub_field('locations'); ?></span>
                    
                <?php endwhile;
                endif;?>                    

                </p>
            
            </div>        

            <div class="ticket__deposit">

                <h4 class="heading heading__xl font400 mb0">£99</h4>
           
            </div>            
                    
            <div class="ticket__book">
                
                <a href="<?php the_permalink();?>" type="button" class="button">Secure Your Place Now</a>
            
            </div>    
                
        </div><!--ticket-->      

        <?php endwhile; wp_reset_postdata(); ?>

    <?php endif; ?>

<p class="heading__xs">* Exclusions apply.  See terms for details</p>

<!--<div class="text-center mt2 mb1">
    
    <a href="/team" type="button" class="button">See All Courses</a>   
                         
</div>-->

    </div><!--12-->

 </div><!--r-->

<!-- ******************* Product Summary END ******************* -->

<!-- ******************* Meet The Team ******************* -->

<div class="row">

    <div class="col-12">
        
	<h3 class="heading heading__lg mb1">Meet The Team</h3>   

    </div>
    
<?php 
  if( have_rows('team_member') ): 
    while ( have_rows('team_member') ) : the_row(); 
    
    $teamImg = get_sub_field('mtt_image'); ?>

    <div class="col-4">
        
        <div class="bio">
                
                <img src="<?php echo $teamImg['url']; ?>"/>
        		
        		<h3 class="heading heading__md heading__alt-color mt1 mb1 text-center"><?php the_sub_field('name'); ?></h3>        
        
        </div>
    
    </div>
			
<?php endwhile;
endif;?>

</div><!--r-->

<div class="text-center mt1 mb3">
    
    <a href="/team" type="button" class="button">Find Out More</a>   
                         
</div>

<!-- ******************* Meet The Team END ******************* -->

<!-- ******************* Gallery  ******************* -->

<div class="row"><!--Gallery Block -->

    <div class="col-lg-12">

	<h3 class="heading heading__lg mb1"><?php the_field('gs_heading'); ?></h3>   

    <?php
    $images = get_field('image_gallery');
    if( $images ): ?>

        <div class="gallery">

        <?php foreach( $images as $image ): ?>

        <a href="<?php echo $image['url']; ?>" class="lodge-gallery"  alt="<?php echo $image['alt']; ?>" style="background-image: url(<?php echo $image['url']; ?>);"></a>

        <?php endforeach; ?>

    </div>

    <?php endif; ?>
    
    <div class="text-center mt0 mb3">
        
        <a href="/gallery" type="button" class="button">See Full Gallery</a>   
    
    </div>
    
    </div>

</div><!--row-->

<!-- ******************* Gallery END ******************* -->

<!-- ******************* News Section ******************* -->

<h3 class="heading heading__lg mb1">Latest News</h3>   

    <div class="post-summary">
            
            <?php 
            $args = array (
            	'post_type'              => 'post',
            	'posts_per_page'         => '1'
            );
            
            // The Query
            $query = new WP_Query( $args );
            
            // The Loop
            if ( $query->have_posts() ) {
            	while ( $query->have_posts() ) {
            		$query->the_post();
            
            $postImage = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' ); ?>
     
            <div class="post-summary__item">
         
                <a href="<?php the_permalink() ?>" rel="bookmark" title="Link to <?php the_title_attribute(); ?>" class="post-image"><img src="<?php echo $postImage[0];?>"/></a>         
                
                <h2 id="post-<?php the_ID(); ?>" class="heading heading__md">
        
                    <a href="<?php the_permalink() ?>" rel="bookmark" title="Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a>
                
                </h2>
             
                <p class="heading heading__xs heading__alt-color font200 mb1"><?php the_date() ?></p> 
                <?php the_excerpt() ?>     
                
                <a href="<?php the_permalink() ?>" rel="bookmark" title="Link to <?php the_title_attribute(); ?>" class="">Read More</a>     
      
            </div>

            <?php 	}
            } else {
            	// no posts found
            }
            // Restore original Post Data
            wp_reset_postdata();?>

        </div>

<!-- ******************* News Section END ******************* -->

</div><!--c-->

<?php get_footer();?>