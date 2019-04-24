<h3>Browse By Subject</h3> 
 <div class="cat-archives">
	<?php $categories = get_categories();
	foreach($categories as $category) {
	   echo '<a href="' . get_category_link($category->term_id) . '">' . $category->name . '</a>';
	}?>
 </div>
 
<hr class="sidebar"/>

<h3>Browse By Date</h3> 
 <div class="month-archives">
	<?php wp_get_archives('type=monthly'); ?>
 </div>