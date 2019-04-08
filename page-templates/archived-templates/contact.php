<?php
/**
 * ============== Template Name: Contact Page
 *
 * @package ramsbury
 */
get_header();?>

<?php get_template_part('template-parts/page', 'hero');?>

<div class="container">

    <div class="row">
    
        <div class="col-5 offset-1">
            
            <h3 class="heading heading__sm">Got A Question for us?</h3>
            
            <p>Drop us an email, find us on social or fire us a message.  Whichever way you chose, we'll get back to you as soon as we possibly can.</p>
            
            <a href="mailto:info@ramsbury.co.uk">info@ramsbury.co.uk</a>

            <div class="contactSocials">
                        <?php if( have_rows('social_links', 'option') ): while( have_rows('social_links', 'option') ): the_row(); ?>
                          <a href="<?php the_sub_field('page_link'); ?>"><i class="fab fa-<?php the_sub_field('name'); ?>"></i></a>
                        <?php endwhile; endif; ?>  
            </div>
        
        </div>
    
        <div class="col-5">
            
            <?php echo do_shortcode('[contact-form-7 id="1325" title="Untitled"]');?>    
            
        </div>
    
    </div><!--r-->

</div><!--c-->

<?php get_footer();?>
