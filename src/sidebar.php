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
    <div class="calendar">
	    <?php
	        echo do_shortcode( '[tribe_mini_calendar]' );
	    ?>
    </div>
	<div class="sectionTitle">
        <span class="title">
        	Kategorije
        </span>
    </div>

	<ul class="categories">
		<?php $obj_id = get_queried_object_id(); // category ID ?>
		<?php wp_list_categories(array(
			'child_of' => $obj_id
//			/*'hide_empty' => false // use this to show ALL sub-categories, even empty ones; otherwise omit this*/
		));
		wp_reset_query();
		?>
<!--	--><?php
/*		$parentscategory = "";
		foreach((get_the_category()) as $category) {
			if ($category->category_parent == 0) {
				$parentscategory .= '<li><a href="' . get_category_link($category->cat_ID) . '" title="' . $category->name . '">' . $category->name . '</a></li>';
			}
		}
		echo substr($parentscategory,0,-2);
	*/?>
	</ul>
    <div class="sectionTitle">
        <span class="title">
        	Tagovi
        </span>
    </div>
	<ul class="categories">
		<?php
		$tags = get_tags();
		foreach ( (array) $tags as $tag ) {
			echo '<li><a href="' . get_tag_link ($tag->term_id) . '" rel="tag">' . $tag->name . '</a></li>';
		}
		?>
		</li>
	</ul>
	<div class="side-gallery">
		<div class="sectionTitle">
	        <span class="title">
	            Galerija
	        </span>
			<ul>
				<?php echo instagram($count = 8); ?>
			</ul>
		</div>
	</div>
</aside>
<!-- /sidebar -->
