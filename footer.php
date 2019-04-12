<?php
/**
 * The template for displaying the footer
 * @package ramsbury
 */
?>

            </main>
    
            <footer class="footer">

    
        <div class="container">
    
            <div class="socket">
    
                <div class="row">
    
                    <div class="col-4 socials">
    
                        <?php if( have_rows('social_links', 'option') ): while( have_rows('social_links', 'option') ): the_row(); ?>
    
                        <a href="<?php the_sub_field('page_link'); ?>"><i class="fab fa-<?php the_sub_field('name'); ?>"></i></a>
    
                        <?php endwhile; endif; ?>
    
                    </div>
    
                    <div class="col-4">
                        
                        <div class="logo-holder">
                            
                            <a href="https://ramsbury.co.uk">
                                
                                <?php get_template_part('inc/img/ramsbury', 'logo');?>
                            
                            </a>
                        
                        </div>
    
                    </div>
    
                    <div class="col-4 socket__colophon">
    
                        &copy; Ramsbury Brewery <?php echo date ('Y');?>
    
                        <a href="">Terms</a>
    
                        <a href="">Privacy</a>
    
                    </div>
    
                </div><!--row-->
    
            </div><!--socket-->
    
        </div><!--container-->
    
    </footer>
    
        </div><!-- #page -->
    
        <?php wp_footer(); ?>
    
    </body>
    
</html>
