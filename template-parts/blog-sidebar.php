<h3 class="heading heading__sm heading__light heading__alt">Recent Articles</h3> 

<?php
$currentID = get_the_ID();
$my_query = new WP_Query( array('cat' => '119', 'showposts' => '5', 'post__not_in' => array($currentID)));
while ( $my_query->have_posts() ) : $my_query->the_post(); ?>

<p><a href="<?php the_permalink(); ?>" class="heading__light "><?php the_title() ?></a></p>

<?php endwhile; ?>
 
<hr class="sidebar"/>

<h3 class="heading heading__sm heading__light heading__alt">Browse By Date</h3> 
 <div class="month-archives">
	<?php wp_get_archives('type=monthly'); ?>
 </div>