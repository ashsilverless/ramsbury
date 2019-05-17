<?php
/**
 * ============== Template Name: Stockist Page
 *
 * @package ramsbury
 */
get_header();?>

<!-- ******************* Map Section ******************* -->

<div style="height:75vh;">
    <?php get_template_part("template-parts/map"); ?>
</div>

<!-- ******************* Map Section END ******************* -->

<!-- ******************* Slider Section ******************* -->

<?php get_template_part('template-parts/find', 'cta');?>

<!-- ******************* Slider Section END ******************* -->

<?php get_footer();?>