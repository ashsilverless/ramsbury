<?php
/**
 * ============== Template Name: Home Page
 *
 * @package ramsbury
 */
get_header();?>

<?php if( get_field('pop_up_active', 'options') == 'active' ) { ?>
<div class="pop-up">
	<div id="popUpClose" class="pop-up__close"><i class="far fa-times-circle"></i></div>
<h2 class="heading heading__xl align-center mb0"><?php the_field('title', 'options');?></h2>
<h2 class="heading heading__md heading__alt align-center mb2"><?php the_field('sub_title', 'options');?></h2>
<p><?php the_field('body_copy', 'options');?></p>
<p class="heading heading__md mb0"><?php the_field('author_name', 'options');?></p>
<p class="mt0"><?php the_field('author_appointment', 'options');?></p>
</div>
<?php };?>

<!-- ******************* Hero Section ******************* -->

<?php get_template_part('template-parts/hero');?>

<!-- ******************* Hero END ******************* -->

<!-- ******************* Slider Section ******************* -->

<div id="home-our-beers" class="text-center pt5 pb5">

<h2 class="heading heading__xl">Our Beers</h2>

<?php get_template_part('template-parts/small', 'carousel');?>

</div>

<!-- ******************* Slider Section END ******************* -->

<!-- ******************* Intro Text ******************* -->

<div class="container">

    <div class="row text-center">

        <div class="col-8 offset-2 pb3">

            <h3 class="heading heading__lg heading__seperator mt1"><span><?php the_field('heading');?></span></h3>

            <div class="expanding-copy">

    <div class="expanding-copy__lead">

            <?php the_field( 'text_block_text' );?>

        </div>

        <?php if( get_field('text_block_text_more') ): ?>

            <a class="trigger-home trigger-expand">Read More</a>

        <?php endif; ?>

    <div class="expanding-copy__more">

        <?php the_field('text_block_text_more'); ?>

    </div>

    <?php if( get_field('text_block_text_more') ): ?>

        <a class="trigger-home trigger-collapse hide">Read Less</a>

    <?php endif; ?>

</div>

        </div><!--col-->

    </div><!--r-->

</div><!--c-->

<!-- ******************* Intro Text END******************* -->

<!-- ******************* Brewsery and Tours CTA ******************* -->

<?php get_template_part('template-parts/brewery', 'tours');?>

<!-- ******************* Brewsery and Tours CTA END******************* -->

<?php get_footer();?>
