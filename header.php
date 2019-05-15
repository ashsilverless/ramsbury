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
<meta name="description" content=" ">
<meta name="keywords" content=" ">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Ramsbury Brewery</title>

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
    	            
	            <a href="/cart" class="cart-button"><i class="fas fa-shopping-basket"></i></a>	            
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
<script>
    

			function easeOutBounce (x) {
				var base = -Math.cos(x * (0.5 * Math.PI)) + 1;
				var rate = Math.pow(base,1.5);
				var rateR = Math.pow(1 - x, 2);
				var progress = -Math.abs(Math.cos(rate * (2.5 * Math.PI) )) + 1;
				return (1- rateR) + (progress * rateR);
			}

			var timing,
				timingProps = {
					type: 'delayed',
					duration: 150,
					start: 'autostart',
					pathTimingFunction: Vivus.LINEAR,
					animTimingFunction: Vivus.LINEAR
				};

			function timingTest (buttonEl, property, type) {
				var activeSibling = buttonEl.parentNode.querySelector('button.active');
				activeSibling.classList.remove('active');
				buttonEl.classList.add('active');

				timingProps.type = (property === 'type') ? type : timingProps.type;
				timingProps.pathTimingFunction = (property === 'path') ? Vivus[type] : timingProps.pathTimingFunction;
				timingProps.animTimingFunction = (property === 'anim') ? Vivus[type] : timingProps.animTimingFunction;

				timing && timing.stop().destroy();
				timing = new Vivus('timing-example', timingProps);
			}

			var hi = new Vivus('ramsbury-logo', {type: 'scenario-sync', duration: 20, start: 'autostart', dashGap: 20, forceRender: false},
				function () {
					if (window.console) {
						console.log('Animation finished. [log triggered from callback]');
					} 
				}),
				obt1 = new Vivus('ramsbury-logo', {type: 'delayed', duration: 150}),
				obt2 = new Vivus('obturateur2', {type: 'sync', duration: 150}),
				obt3 = new Vivus('obturateur3', {type: 'oneByOne', duration: 150}),
				pola = new Vivus('polaroid', {type: 'scenario-sync', duration: 20, forceRender: false});
		
    
</script>
<main><!--closes in footer.php-->