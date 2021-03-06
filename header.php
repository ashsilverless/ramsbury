<?php
/**
 * Header
 *
 * @package ramsbury
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Ramsbury Brewery | Handcrafted from plough to pint</title>

<link rel="stylesheet" href="https://use.typekit.net/dmz2ckm.css"><!--TYPEKIT INJECT-->

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous"><!--Bootstrap CDN-->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous"><!-- Font Awesome CDN-->

<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico" type="image/x-icon" />

<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

<div class="page-border page-border__left-top"></div>
<div class="page-border page-border__right-bottom"></div>

    <div id="page" class="site-wrapper">

        <nav id="nav">
    	    <?php get_search_form(); ?>

    	    <div class="menu-actions">

	    	    <i class="search-trigger fas fa-search"></i>

		        <a href="/cart" class="cart-button"><i class="fas fa-shopping-basket"></i></a>

		        <i class="hamburger-menu fas fa-bars"></i>

    	    </div>

            <div class="brand">

                <a href="<?php echo home_url(); ?>" alt="<?php wp_title(''); ?>" title="<?php wp_title(''); ?>">

                <?php get_template_part('template-parts/ramsbury', 'logo');?>

                </a>

            </div>

            <?php
                wp_nav_menu( array(
                'theme_location' => 'main-menu',
                'container_class' => 'mainMenu' ) );
            ?>

	    </nav>


    <?php if(is_front_page()): ?>

    <!-- Modal Video -->

	<?php get_template_part('template-parts/modal');?>

	<!-- Modal Video END -->

	<?php endif; ?>

<main><!--closes in footer.php-->
