<?php
/**
 * The template for displaying search results pages
 *
 * @package ramsbury
 */

get_header();
?>

<?php $heroImage = get_field('hero_background_image', 1700); ?>

<div class="hero h-auto" style="background-image: url(<?php echo $heroImage['url']; ?>);">

    <div class="container">
    
        <div class="row">
                
            <div class="col-12 hero__content text-center">       
                
                <h1 class="heading heading__xl heading__light mt3">
                    
<?php
/* translators: %s: search query. */
printf( esc_html__( 'Search Results for: %s', 'slmaster' ), '<span>' . get_search_query() . '</span>' );
?>
                    
                </h1>  

                               
            </div>       
                
        </div>
    
    </div>
    
</div>

<!-- ******************* Hero Content END ******************* -->


<?php
global $wp_query;
?>

<div class="search-header text-center mt3 mb3">

<h2 class="heading__md"><?php _e( 'You searched for', 'locale' ); ?> '<?php the_search_query(); ?>'</h2>

<p>We found <?php echo $wp_query->found_posts; ?>  results</p>

</div>

<div class="container">
    
    <div class="row row-eq-height">

        <?php if ( have_posts() ) { ?>

            <?php while ( have_posts() ) { the_post(); ?>

<div class="col-4 search-card">

    <div class="content">
        
        <h2 class="heading heading__md"><a href="<?php echo get_permalink(); ?>"><?php the_title();  ?></a></h2>
        
        <p>
            <?php the_excerpt();?>
            <?php $description = get_field("description", $id);?>
            <?php echo substr(wp_strip_all_tags($description), 0, 130) . "..."; ?>
    
        </p>
        
        <a href="<?php the_permalink(); ?>" class="read-more">Read More</a>
    
    </div> 

</div>

            <?php } ?>
    </div>
    

<div class="pages">
           <?php echo paginate_links(); ?>
</div>

</div>
        <?php } ?>



<?php get_footer(); ?>








