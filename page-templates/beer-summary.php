<?php
/**
 * ============== Template Name: Beers Page
 *
 * @package ramsbury
 */
get_header();?>

<!-- ******************* Our Products Range ******************* -->

<div class="mt10">

<?php get_template_part('template-parts/our', 'products');?>

</div>

<!-- ******************* Our Products Range END ******************* -->

<!-- ******************* Find A Pint CTA ******************* -->

<?php get_template_part('template-parts/find', 'beer');?>

<!-- ******************* Find A Pint CTA END******************* -->

<!-- ******************* Brewsery and Tours CTA ******************* -->

<?php get_template_part('template-parts/brewery', 'tours');?>

<!-- ******************* Brewsery and Tours CTA END******************* -->

<?php get_footer();?>