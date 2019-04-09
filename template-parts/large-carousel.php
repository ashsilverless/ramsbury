<div class="large-carousel owl-carousel owl-theme"> 
    
	<?php
		$args = array(
			'post_type' => 'product',
			'posts_per_page' => 4
			);
		$loop = new WP_Query( $args );
		if ( $loop->have_posts() ) {
			while ( $loop->have_posts() ) : $loop->the_post();?>
			
    <div class="large-carousel__item">

<div class="row">
    
    <div class="col-3 offset-1">

        <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $loop->post->ID ), 'single-post-thumbnail' );?>

        <div class="bottle">
            <img src="<?php  echo $image[0]; ?>" data-id="<?php echo $loop->post->ID; ?>">
        </div>

    </div><!---3-->
    
    <div class="col-6">
    
    <div class="product-details">
        
        <div class="top">
        
        <p class="heading__light mb0"><?php the_field('abv');?></p>
        <h2 class="heading heading__lg"><?php the_field('strapline');?></h2>
        
        </div>
        
        <div class="detail">
        <h2 class="heading heading__sm"><?php the_title();?></h2>

<div class="expanding-copy">

    <div class="expanding-copy__lead">
    
        <?php the_field( 'description' );?>
    
    </div>
    
    <?php if( get_field('ingredients') ): ?>
    
        <a class="trigger-expand">Read More</a>    
    
    <?php endif; ?>
    
    <div class="expanding-copy__more">

        <?php 
            if( have_rows('ingredients') ): ?>


            
            <h4 class="heading heading__xs">Ingredients:</h4>
            <ul class="inline-list">
            <?php while ( have_rows('ingredients') ) : the_row(); ?>
              <?php $gluten = get_sub_field("contains_gluten"); ?>                
            <li class="<?php echo $gluten;?>"><?php the_sub_field( 'ingredient' );?></li>

        <?php endwhile; ?>
        
            </ul>
            
        <?php endif;?>
          
        <?php the_field('allergy_information'); ?>              
    </div>    
    
    <?php if( get_field('ingredients') ): ?>
    
        <a class="trigger-collapse hide">Read Less</a>    
    
    <?php endif; ?>
    
</div>




        
        </div>
        
        <div class="action">
        <?php wc_get_template_part( 'content', 'single-product' ); ?>
        </div>
        
    </div>
       
    </div><!--6-->
    
    </div><!--r-->
    
    </div><!--item-->
			
	<?php endwhile;
		}
		wp_reset_postdata();?>

</div>

