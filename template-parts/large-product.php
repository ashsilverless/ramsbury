<?php while ( have_posts() ) : the_post();
    
    $productColor = get_field('product_colour');?>

<div class="product-nav">
    <?php if(get_previous_post()) {?>
    <div class="previous">
        <?php previous_post_link('%link'); ?>
    </div>
   <?php }
    if(get_next_post()) {?>
    <div class="next">
        <?php next_post_link('%link'); ?> 
    </div>
   <?php }?>    
</div>               

    <div class="row">
        
        <div class="col-3 offset-1">
    
            <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $loop->post->ID ), 'single-post-thumbnail' );?>
    
            <div class="bottle">
                
                <img src="<?php  echo $image[0]; ?>" data-id="<?php echo $loop->post->ID; ?>">
                
            </div>
    
        </div><!---col-->
     
        <div class="col-7">
        
            <div class="product-details">
            
                <div class="top">
                
                    <p class="heading heading__alt heading__light mb0"><?php the_field('abv');?>% <span class=" heading heading__body heading__xs heading__light">ABV</span></p>
                    
                    <h2 class="heading heading__xl heading__light" style="color: <?php echo $productColor;?>;"><?php the_field('strapline');?></h2>
                
                </div>
                
                <div class="detail">
                    
                    <h2 class="heading heading__sm heading__alt heading__caps heading__light"><?php the_title();?></h2>
        
                    <div class="expanding-copy mb2">
        
            <div class="expanding-copy__lead">
            
                <p><?php the_field( 'description' );?></p>
            
            </div>
        
            <?php if( get_field('ingredients') ): ?>
            
                <a class="trigger-expand mt1" style="color: <?php echo $productColor;?>;">Read More</a>    
            
            <?php endif; ?>
            
            <div class="expanding-copy__more mb1">
        
                <?php 
                    if( have_rows('ingredients') ): ?>
        
        
                    
                    <h4 class="heading heading__body heading__caps heading__xs mt2 mb1">Ingredients:</h4>
                    <ul class="inline-list">
                    <?php while ( have_rows('ingredients') ) : the_row(); ?>
                      <?php $gluten = get_sub_field("contains_gluten"); ?>                
                    <li class="<?php echo $gluten;?>"><?php the_sub_field( 'ingredient' );?></li>
        
                <?php endwhile; ?>
                
                    </ul>
                    
                <?php endif;?>
        
                <h4 class="heading heading__body heading__caps heading__xs mt2 mb1">Allergy Information:</h4>          
                <?php the_field('allergy_information'); ?>    
        
                <h4 class="heading heading__body heading__caps heading__xs mt2 mb1">Available As:</h4> 
                <ul class="inline-list">
                    <?php 
                global $woocommerce, $product, $post;
                if( $product->is_type( 'variable' ) ){
                    foreach ( $product->get_available_variations() as $key => $variation ) {
                        foreach ($variation['attributes'] as $attribute => $term_slug ) {
                            $taxonmomy = str_replace( 'attribute_', '', $attribute );
                            $attr_label_name = wc_attribute_label( $taxonmomy );
                            $term_name = get_term_by( 'slug', $term_slug, $taxonmomy )->name;
                            echo '<li>' . $term_name . '</li>';
                        }
                    }
                } ?>
                </ul>         
            </div>    
            
            <?php if( get_field('ingredients') ): ?>
            
                <a class="trigger-collapse hide mb2" style="color: <?php echo $productColor;?>;">Read Less</a>    
            
            <?php endif; ?>
            
        </div>
        
                </div>
                
                <div class="action pb5">
                    
                    <?php wc_get_template_part( 'content', 'single-product' ); ?>
                
                </div>
            
        </div>
           
        </div><!--col-->
        
    </div><!--r-->
    
<?php endwhile; // end of the loop. ?>
