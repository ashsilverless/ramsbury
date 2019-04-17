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

<!-- ******************* Map Section ******************* -->

<div style="height:75vh; background:darkgrey">
    TOUR BLOCK
</div>

<!-- ******************* Map Section END ******************* -->

<!-- ******************* Gallery Section ******************* -->

<?php get_template_part('template-parts/gallery');?>

<!-- ******************* Gallery Section ******************* -->

<!-- ******************* Slider Section ******************* -->

<?php get_template_part('template-parts/large', 'carousel');?>

<!-- ******************* Slider Section END ******************* -->

<?php get_footer();?>