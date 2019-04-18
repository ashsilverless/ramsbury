<?php
/**
 * The template for displaying the footer
 * @package ramsbury
 */
?>

</main>

<footer class="footer">

    <div class="details">
    
        <?php get_template_part('template-parts/ramsbury', 'logo');?>        
        
        <p class="mt2"><?php the_field('footer_heading', 'option');?></p>      
         
        <p><?php the_field('shop_address', 'option');?></p>             
        
        <p><?php the_field('shop_telephone', 'option');?></p>          
    
        <div class="socials mt1">
        
            <?php if( have_rows('social_links', 'option') ): while( have_rows('social_links', 'option') ): the_row(); ?>
            
            <a href="<?php the_sub_field('page_link'); ?>"><i class="fab fa-<?php the_sub_field('name'); ?>"></i></a>
            
            <?php endwhile; endif; ?>
        
        </div>

    </div>

    <div class="container-fluid pl0 pr0">
    
        <div class="socket">
    
            <div class="row">
    
                <div class="col-6">
                    
                    &copy; Ramsbury Brewery <?php echo date ('Y');?> | 
                    
                    <a href="">Terms & Conditions</a> | 
                    
                    <a href="">Privacy Policy</a>
                        
                </div>
        
                <div class="col-6 text-right">
                    
                    <a href="">Basket</a> | 
                    
                    <a href="">Checkout</a> | 
                                    
                    <a href="">My Account</a>                
        
                </div>
        
            </div><!--row-->
    
        </div><!--socket-->
    
    </div><!--container-->

</footer>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>
