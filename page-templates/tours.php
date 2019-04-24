<?php
/**
 * ============== Template Name: Tours Page
 *
 * @package ramsbury
 */
get_header();?>

<!-- ******************* Hero Section ******************* -->

<?php get_template_part('template-parts/hero');?>

<!-- ******************* Hero END ******************* -->

<!-- ******************* Tour Section ******************* -->

<?php get_template_part('template-parts/tour-booking');?>

<!-- ******************* Tour Section END ******************* -->

<!-- ******************* Gallery Section ******************* -->

<?php get_template_part('template-parts/gallery');?>

<!-- ******************* Gallery Section ******************* -->

<!-- ******************* Slider Section ******************* -->

<?php get_template_part('template-parts/large', 'carousel');?>

<!-- ******************* Slider Section END ******************* -->

<?php get_footer();?>