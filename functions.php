<?php
/**
 * ramsbury functions and definitions
 *
 * @package ramsbury
 */
/** == Ditch Junk == */

remove_action('wp_head', 'print_emoji_detection_script', 7);

remove_action('wp_print_styles', 'print_emoji_styles');

/** = Enqueue scripts and styles = */

function ramsbury_scripts() {

	wp_enqueue_style( 'ramsbury-style', get_stylesheet_uri() );

	wp_enqueue_script( 'ramsbury-core-js', get_template_directory_uri() . '/inc/js/compiled.js', array('jquery', 'jquery-ui-datepicker'), true);

	wp_enqueue_script( 'mapbox-gl', get_template_directory_uri() . '/inc/js/mapbox-gl.js', array(), true );

	wp_enqueue_script( 'mapbox-gl-geocoder', get_template_directory_uri() . '/inc/js/mapbox-gl-geocoder.min.js', array(), true );

    wp_localize_script('ramsbury-core-js', 'ajax_object', array(

		'ajax_url' => admin_url( 'admin-ajax.php' ),

		'checkout_url' => get_permalink( wc_get_page_id( 'cart' ) )

	));

}

add_action( 'wp_enqueue_scripts', 'ramsbury_scripts' );

/**= Actions AJAX calls =**/

add_action( 'wp_ajax_get_availability', 'availability_calendar' );

add_action( 'wp_ajax_available_dates', 'available_dates' );

add_action( 'wp_ajax_available_hours', 'available_hours' );

add_action( 'wp_ajax_add_to_cart', 'add_to_cart' );

add_action( 'wp_ajax_nopriv_get_availability', 'availability_calendar' );

add_action( 'wp_ajax_nopriv_available_dates', 'available_dates' );

add_action( 'wp_ajax_nopriv_available_hours', 'available_hours' );

add_action( 'wp_ajax_nopriv_add_to_cart', 'add_to_cart' );

/**= Add Menus =**/

function sl_custom_menu() {
  register_nav_menus(
    array(
      'main-menu' => __( 'Main Menu' ),
      'about-menu' => __( 'Advice Menu' )
    )
  );
}
add_action( 'init', 'sl_custom_menu' );

/* Dashboard Config */

add_action('wp_dashboard_setup', 'sl_dashboard_widget');

function sl_dashboard_widget() {
global $wp_meta_boxes;

wp_add_dashboard_widget('custom_help_widget', 'Technical Support', 'custom_dashboard_help');
}
function custom_dashboard_help() {
?>

<img src="https://silverless.co.uk/wp-content/themes/silverless/images/logo__silverless.svg" style="max-width:100%;
height:auto;"/>

<img src="https://silverless.co.uk/wp-content/uploads/2016/10/icon-screen-delete.svg" style=" display: inline-block; width: 60px; margin: 2em calc(50% - 30px) 1em;"/>

<p>For support or general enquiries please contact us directly at <a href="mailto:hello@silverless.co.uk">hello@silverless.co.uk</a> or call <a href="tel:+44 (0)1672 556532">01672 556532</a></p>
<p>We aim to respond within 60 minutes during hours (Mon to Fri 9am - 5pm)</p>

<?php
}

/* Dashboard Style */

add_action('admin_head', 'my_custom_fonts');

function my_custom_fonts() {
  echo '
<style>
#menu-posts-camp .dashicons-admin-post:before{font-family:dashicons;content:"\f102"}#toplevel_page_map-locations .dashicons-admin-generic:before{font-family:dashicons;content:"\f231"}#toplevel_page_testimonials .dashicons-admin-generic:before{font-family:dashicons;content:"\f101"}#toplevel_page_call-to-action .dashicons-admin-generic:before{font-family:dashicons;content:"\f488"}.taxonomy-where tr.form-field.term-description-wrap,body.taxonomy-what .form-field.term-description-wrap,body.taxonomy-when .form-field.term-description-wrap,body.taxonomy-where .form-field.term-description-wrap{display:none}#wpcontent,#wpfooter,#wpwrap{background:#cdc7c0}#adminmenu,#adminmenu .wp-submenu,#adminmenuback,#adminmenuwrap,#wpadminbar{background-color:#362b3a}#adminmenu .wp-has-current-submenu .wp-submenu,#adminmenu .wp-has-current-submenu .wp-submenu.sub-open,#adminmenu .wp-has-current-submenu.opensub .wp-submenu,#adminmenu a.wp-has-current-submenu:focus+.wp-submenu,.no-js li.wp-has-current-submenu:hover .wp-submenu{background-color:#302036}#adminmenu .wp-has-current-submenu .wp-submenu .wp-submenu-head,#adminmenu .wp-menu-arrow,#adminmenu .wp-menu-arrow div,#adminmenu li.current a.menu-top,#adminmenu li.wp-has-current-submenu a.wp-has-current-submenu,.folded #adminmenu li.current.menu-top,.folded #adminmenu li.wp-has-current-submenu{background:#312036;color:#e57732}ul#adminmenu a.wp-has-current-submenu:after,ul#adminmenu>li.current>a.current:after{border-right-color:#cdc7c0}#adminmenu .wp-submenu a:focus,#adminmenu .wp-submenu a:hover,#adminmenu a:hover,#adminmenu li.menu-top>a:focus{color:#e4652f}

.post-type-page .acf-postbox {
  background: hsl(283, 14%, 20%);
  border-color: hsl(283, 14%, 20%);
}

.post-type-page #poststuff h2 {
  font-size: 14px;
  color: hsl(32, 12%, 78%);
  border:none;
  }

.post-type-page .acf-fields>.acf-field {
  border-color: hsl(30, 9%, 71%) !important;
}

.post-type-page .acf-flexible-content .layout {
  background: hsl(32, 12%, 78%);
  border: none;
  margin-bottom:50px;
}

.post-type-page .acf-flexible-content .layout .acf-fc-layout-handle {
    font-size:18px;
    text-transform:uppercase;
    font-weight:900;}

.post-type-page .acf-flexible-content .layout .acf-fc-layout-order {
  background: hsl(15, 73%, 46%);
  font-size: 12px;
  color: hsl(0, 0%, 100%);
}

.post-type-page .acf-flexible-content .no-value-message {
  color: hsl(0, 0%, 100%);
}

.post-type-page .inside.acf-fields > .acf-field > .acf-label {
    color: hsl(0, 0%, 100%);
    text-transform: uppercase;
    font-size: 24px;
    }

</style>';
}

/**
 * ACF Options Pages.
 */

 if( function_exists('acf_add_options_page') ) {

	acf_add_options_page(array(
		'page_title' 	=> 'Theme Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'site-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));

	/*acf_add_options_sub_page(array(
		'page_title' 	=> 'Header Settings',
		'menu_title'	=> 'Header',
		'parent_slug'	=> 'site-general-settings',
	));*/

	acf_add_options_page(array(
		'page_title' 	=> 'Testimonials',
		'menu_title'	=> 'Testimonials',
		'menu_slug' 	=> 'testimonials',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));

	acf_add_options_page(array(
		'page_title' 	=> 'Call To Action',
		'menu_title'	=> 'Call To Action',
		'menu_slug' 	=> 'call-to-action',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));

	acf_add_options_page(array(
		'page_title' 	=> 'Map Locations',
		'menu_title'	=> 'Map Locations',
		'menu_slug' 	=> 'map-locations',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));

	acf_add_options_page(array(
		'page_title' 	=> 'Pop Up Message',
		'menu_title'	=> 'Pop Up Message',
		'menu_slug' 	=> 'popup-msg',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
}

/**= Remove Default Menu Items =**/

//function remove_menus(){
//  remove_menu_page( 'edit-comments.php' );          //Comments
//}
//add_action( 'admin_menu', 'remove_menus' );

/**= Master Admin View Only =**/

$user_id = get_current_user_id();
if ($user_id == 1) {
    //Leave all items accessible
} else {

    function remove_menus(){
    	remove_menu_page( 'edit-comments.php' ); //Comments
    	remove_menu_page( 'themes.php' ); //Appearance
    	remove_menu_page( 'plugins.php' );  //Plugins
    	remove_menu_page( 'users.php' ); //Users
    	remove_menu_page( 'tools.php' ); //Tools
    	remove_menu_page( 'options-general.php' ); //Settings
    	remove_menu_page( 'edit.php?post_type=acf-field-group' ); //ACF
    	remove_menu_page( 'edit.php?post_type=gl_js_maps' ); //Mapbox
    }
    add_action( 'admin_menu', 'remove_menus' );

}

/**= Allow SVG Upload =**/

function add_file_types_to_uploads($file_types){
$new_filetypes = array();
$new_filetypes['svg'] = 'image/svg+xml';
$file_types = array_merge($file_types, $new_filetypes );
return $file_types;
}
add_action('upload_mimes', 'add_file_types_to_uploads');

/**= Set WooCommerce Theme Support =**/

add_action( 'after_setup_theme', function() {
	add_theme_support( 'woocommerce' );
} );

/**= WooCommerce - Custom Customer Message in Checkout =**/

function md_custom_woocommerce_checkout_fields( $fields )
{
    $fields['order']['order_comments']['placeholder'] = 'Pop any info you need us to know in here, please';

    return $fields;
}
add_filter( 'woocommerce_checkout_fields', 'md_custom_woocommerce_checkout_fields' );

/**= Social Sharing Buttons =**/

function ramsbury_social_sharing_buttons($content) {
	global $post;
	if(is_singular() || is_home()){

		// Get current page URL
		$ramsburyURL = urlencode(get_permalink());

		// Get current page title
		$ramsburyTitle = htmlspecialchars(urlencode(html_entity_decode(get_the_title(), ENT_COMPAT, 'UTF-8')), ENT_COMPAT, 'UTF-8');
		// $ramsburyTitle = str_replace( ' ', '%20', get_the_title());

		// Get Post Thumbnail for pinterest
		$ramsburyThumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );

		// Construct sharing URL without using any script
		$twitterURL = 'https://twitter.com/intent/tweet?text='.$ramsburyTitle.'&amp;url='.$ramsburyURL.'&amp;via=Crunchify';
		$facebookURL = 'https://www.facebook.com/sharer/sharer.php?u='.$ramsburyURL;

		// Based on popular demand added Pinterest too
		$pinterestURL = 'https://pinterest.com/pin/create/button/?url='.$ramsburyURL.'&amp;media='.$ramsburyThumbnail[0].'&amp;description='.$ramsburyTitle;

		// Add sharing button at the end of page/page content
		$content .= '<!-- Implement your own superfast social sharing buttons without any JavaScript loading. No plugin required. Detailed steps here: http://crunchify.me/1VIxAsz -->';
		$content .= '<div class="contactSocials"><h5 class="heading heading__sm">SHARE </h5>';
		$content .= ' <a href="'. $twitterURL .'" target="_blank"><i class="fab fa-twitter"></i></a>';
		$content .= '<a href="'.$facebookURL.'" target="_blank"><i class="fab fa-facebook-square"></i></a>';
		$content .= '</div>';

		return $content;
	}else{
		// if not a post/page then don't include sharing button
		return $content;
	}
};
//add_filter( 'the_content', 'ramsbury_social_sharing_buttons');

function jh_add_script_to_footer(){
    if( ! is_admin() ) { ?>
    <script>

jQuery(document).ready(function($){

});
</script>
<?php
    }
}
add_action( 'wp_footer', 'jh_add_script_to_footer' );

// Change 'add to cart' text on single product page
add_filter( 'woocommerce_product_single_add_to_cart_text', 'add_to_cart_text' );
function add_to_cart_text() {

    $productColor = get_field('product_colour');?>

    <i class="fas fa-shopping-basket"></i> Add To My Basket

<?php }

function add_content_after_addtocart() {

    $productColor = get_field('product_colour');?>

<div class="locally">
    <a href="/stockists/" class="button">Drink Locally<i class="fas fa-map-marked-alt"></i></a>
</div>

<?php }
add_action( 'woocommerce_after_add_to_cart_button', 'add_content_after_addtocart' );

add_filter('upload_mimes', 'bt_upload_svg');

function bt_upload_svg ( $existing_mimes = array() ) {
	// add your extension to the array
	$existing_mimes['svg'] = 'image/svg+xml';
	return $existing_mimes;
}


/**= Functions Calendar =**/

function availability_calendar() {

	require_once("functions-calendar.php");

	get_availability();

}

function available_dates() {

	require_once("functions-calendar.php");

	get_available_dates();
}

function available_hours() {

	require_once("functions-calendar.php");

	get_hours();
}

function add_to_cart() {

	require_once("functions-calendar.php");

	add_product_to_cart();

}

/**= Functions Calendar END =**/

// Make the search to index custom
/**
 * Extend WordPress search to include custom fields
 * http://adambalee.com
 *
 * Join posts and postmeta tables
 * http://codex.wordpress.org/Plugin_API/Filter_Reference/posts_join
 */
function cf_search_join( $join ) {
    global $wpdb;
    if ( is_search() ) {
        $join .=' LEFT JOIN '.$wpdb->postmeta. ' ON '. $wpdb->posts . '.ID = ' . $wpdb->postmeta . '.post_id ';
    }
    return $join;
}
add_filter('posts_join', 'cf_search_join' );

/**
 * Modify the search query with posts_where
 * http://codex.wordpress.org/Plugin_API/Filter_Reference/posts_where
 */
function cf_search_where( $where ) {
    global $pagenow, $wpdb;
    if ( is_search() ) {
        $where = preg_replace(
            "/\(\s*".$wpdb->posts.".post_title\s+LIKE\s*(\'[^\']+\')\s*\)/",
            "(".$wpdb->posts.".post_title LIKE $1) OR (".$wpdb->postmeta.".meta_value LIKE $1)", $where );
    }
    return $where;
}
add_filter( 'posts_where', 'cf_search_where' );

/**
 * Prevent duplicates
 * http://codex.wordpress.org/Plugin_API/Filter_Reference/posts_distinct
 */
function cf_search_distinct( $where ) {
    global $wpdb;
    if ( is_search() ) {
        return "DISTINCT";
    }
    return $where;
}
add_filter( 'posts_distinct', 'cf_search_distinct' );

function custom_excerpt_length( $length ) {
	return 20;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

add_filter( 'woocommerce_show_variation_price', '__return_true' );

function force_local_pickup_only($rates, $package) {
foreach ($package['contents'] as $item) {
$product = $item['data'];
$shipping_class = $product->get_shipping_class();

if ('local' === $shipping_class) {
// The cart requires pickup
return array(
'local_pickup' => $rates['local_pickup'],
);
}
}

return $rates;
}
add_filter('woocommerce_package_rates', 'force_local_pickup_only', 10, 2);
