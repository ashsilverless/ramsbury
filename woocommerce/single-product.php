<?php
/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header(); ?>

<!-- ******************* Hero Product ******************* -->

<div class="product-hero bottom-border
<?php
    global $post;
    $terms = get_the_terms( $post->ID, 'product_cat' );
    foreach ($terms as $term) {
        $product_cat_id = $term->name;

    $raw = strtolower($product_cat_id);
    $modified = str_replace(' ', '', $raw);
    echo $modified." ";
    }
?>">

    <div class="container">

        <?php get_template_part('template-parts/large', 'product');?>

    </div>

</div>

<!-- ******************* Hero Product END ******************* -->

<!-- ******************* Our Products Range ******************* -->

<?php get_template_part('template-parts/our', 'products');?>

<!-- ******************* Our Products Range END ******************* -->

<!-- ******************* Find A Pint CTA ******************* -->

<?php get_template_part('template-parts/find', 'beer');?>

<!-- ******************* Find A Pint CTA END******************* -->

<!-- ******************* Brewsery and Tours CTA ******************* -->

<?php get_template_part('template-parts/brewery', 'tours');?>

<!-- ******************* Brewsery and Tours CTA END******************* -->

<?php get_footer( '' );
