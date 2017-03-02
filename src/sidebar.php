<!-- sidebar -->
<aside class="sidebar sticky single" role="complementary" style="margin-top: 40px;">

	<?php //get_template_part('searchform'); ?>
	<?php /*
	<div class="sidebar-widget">
		<?php if(!function_exists('dynamic_sidebar') || !dynamic_sidebar('widget-area-1')) ?>
	</div>

	<div class="sidebar-widget">
		<?php if(!function_exists('dynamic_sidebar') || !dynamic_sidebar('widget-area-2')) ?>
	</div>
	*/?>
	<div class="sectionTitle">
        <span class="title">
        	Kategorije
        </span>
    </div>
	<ul class="categories">
	<?php
		$parentscategory = "";
		foreach((get_the_category()) as $category) {
			if ($category->category_parent == 0) {
				$parentscategory .= '<li><a href="' . get_category_link($category->cat_ID) . '" title="' . $category->name . '">' . $category->name . '</a></li>';
			}
		}
		echo substr($parentscategory,0,-2);
	?>
	</ul>
</aside>
<!-- /sidebar -->
