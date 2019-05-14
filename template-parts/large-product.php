<?php while ( have_posts() ) : the_post();?>

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

<div class="product-wrapper">
    
    <div class="product-wrapper__image">

        <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $loop->post->ID ), 'single-post-thumbnail' );?>
        
        <div class="bottle-wrapper">    
            <img src="<?php  echo $image[0]; ?>" data-id="<?php echo $loop->post->ID; ?>">
        </div>
        
    </div><!--image-->
    
    <div class="product-wrapper__details">

                    <h2 class="heading heading__xl"><?php the_field('strapline');?></h2>

       <div class="mb2">
       <?php get_template_part('template-parts/accent');?>
       </div>

<h2 class="heading heading__sm heading__alt heading__caps"><?php the_title();?></h2>
       
                    <p class="heading heading__body heading__xs font400 mb2"><?php the_field('abv');?>% ABV</p>

<div class="expanding-copy mb2">
            
                <div class="expanding-copy__lead">
                
                    <p><?php the_field( 'description' );?></p>
                
                </div>
            
                <?php if( get_field('ingredients') ): ?>
                
                <a class="trigger-expand" style="color: <?php echo $productColor;?>;">Read More</a>    
                
                <?php endif; ?>
                
                <div class="expanding-copy__more mb1">
            
                    <?php 
                        if( have_rows('ingredients') ): ?>
    
                        <p class="font400 mt1 mb0">Ingredients:</p>
                        <ul class="inline-list">
                        <?php while ( have_rows('ingredients') ) : the_row(); ?>
                          <?php $gluten = get_sub_field("contains_gluten"); ?>                
                        <li class="<?php echo $gluten;?>"><?php the_sub_field( 'ingredient' );?></li>
            
                    <?php endwhile; ?>
                    
                        </ul>
                        
                    <?php endif;?>
            
                    <p class="font400 mt1 mb0">Allergy Information:        
                    <span class="font200"><?php the_field('allergy_information'); ?></span></p>  
            
                    <p class="font400 mt1 mb0">Available As:</p> 
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

<?php wc_get_template_part( 'content', 'single-product' ); ?>
        
    </div><!--details-->    
   
</div>



    
<?php endwhile; // end of the loop. ?>
