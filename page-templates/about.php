<?php
/**
 * ============== Template Name: About Page
 *
 * @package ramsbury
 */
get_header();?>

<!-- ******************* Hero Section ******************* -->

<?php get_template_part('template-parts/hero');?>

<!-- ******************* Hero END ******************* -->

<!-- ******************* Tour Leader ******************* -->

<div class="pt5">

    <div class="container">

        <div class="row">

        <?php if( have_rows('tour_leader') ):
            while ( have_rows('tour_leader') ) : the_row();
            $leaderImage = get_sub_field('image');?>

            <!--<div class="col-6">

                <div class="leader__item mb5" style="background-image: url(<?php echo $leaderImage['url']; ?>);">

	                <div class="overlay"></div>

                   <h2 class="heading heading__md heading__light"> <?php the_sub_field('image_heading');?></h2>

                   <div><?php the_sub_field('image_copy');?></div>

                    <div class="align-center">

	                    <a href="<?php the_sub_field( 'button_target' );?>" type="button" class="button"><?php the_sub_field( 'button_text' );?></a>

                	</div>

                </div><!--leader item

            </div><!--col-->

            <div class="col-8 offset-2 text-center">

               <!--<h2 class="heading heading__lg mb1"> <?php the_sub_field('heading');?></h2>-->

               <?php get_template_part('template-parts/text', 'block');?>

            </div><!--col-->

<?php endwhile; endif;?>

        </div><!--r-->

<!-- ******************* Tour Leader END ******************* -->

<!-- ******************* Process Section ******************* -->

       <h2 class="heading heading__lg text-center mt2 mt1">Our Process</h2>

        <div class="about-carousel owl-carousel owl-theme">

        <?php if( have_rows('process') ):
            while ( have_rows('process') ) : the_row();
            $imageItem = get_sub_field('image');
            //$heroImage = get_field('hero_background_image');
            ?>



        <div class="row process__item mb3">

            <div class="col-4 offset-1">

            <img src="<?php echo $imageItem['url'];?>" alt="<?php echo $imageItem['alt'];?>"/>

            </div><!--col-->

            <div class="col-6">
                <div class="content">
                    <img src="<?php the_sub_field( 'icon' );?>"/>

                    <h3 class="heading heading__sm heading__body font400 mb1"><?php the_sub_field( 'heading' );?>

                        <?php if(get_sub_field('sub_heading')):?>
                        <span><?php the_sub_field( 'sub_heading' );?></span>
                        <?php endif;?>

                    </h3>

                    <?php the_sub_field( 'copy' );?>
                </div>
            </div><!--col-->

        </div><!--r-->

        <?php endwhile; endif;?>

        </div><!--about carousel-->

    </div><!--c-->



<!-- ******************* Process Section END ******************* -->

<!-- ******************* Cycle Section ******************* -->

<div class="mt3 pb5">

    <div class="container">

            <div class="row">

            <?php if( have_rows('cycle_of_beer') ):
                while ( have_rows('cycle_of_beer') ) : the_row();
                $cycleImage = get_sub_field('image');
                ?>

                <div class="col-8 offset-2 text-center">

                    <h2 class="heading heading__lg mb1 text-center"><?php the_sub_field( 'heading' );?></h2>

                    <?php the_sub_field( 'copy' );?>

                </div>

                <div class="col-12">

                    <img src="<?php echo $cycleImage['url'];?>" class="cycle-image mt5 mb3" alt="<?php echo $cycleImage['alt'];?>"/>

                </div>

            <?php endwhile; endif;?>

            </div><!--r-->

    </div><!--c-->

</div>


</div><!--dark-->
<!-- ******************* Cycle Section END******************* -->

<!-- ******************* Map Section ******************* -->

<div style="height:75vh;" class="top-border">
    <?php get_template_part("template-parts/brewery", "map"); ?>
</div>

<!-- ******************* Map Section END ******************* -->

<?php get_footer();?>
