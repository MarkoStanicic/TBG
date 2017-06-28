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
    <!--<div class="calendar">
	    <?php
/*	        echo do_shortcode( '[tribe_mini_calendar]' );
	    */?>
    </div>-->
	<div class="sectionTitle">
        <span class="title">
        	Kategorije
        </span>
    </div>
	<?php
		//= get post category
		$postCategory = get_the_category();
		//= find parent category from $postCategory
		$parentCategory = $postCategory[0]->cat_ID;
		//= get sub categories (children of parent category)
		$subCategories = get_categories('&child_of=' . $parentCategory . '&hide_empty');
		//= echo result
		echo '<ul class="categories">';
		foreach ($subCategories as $subCategory) {
			echo sprintf('<li><a href="%s">%s</a></li>', get_category_link($subCategory->term_id), apply_filters('get_term', $subCategory->name));
		}
		echo '</ul>';
	?>
    <div class="sectionTitle">
        <span class="title">
        	Tagovi
        </span>
    </div>
	<?php
		$tags = get_tags(); //= get tag list
		echo '<ul class="tags">';
		foreach ( (array) $tags as $tag ) {
			echo '<li><a href="' . get_tag_link ($tag->term_id) . '" data-id="' . $tag->term_id . '" rel="tag">' . $tag->name . '</a></li>';
		}
		echo '</ul>';
	?>
	<div class="side-gallery">
		<div class="sectionTitle">
	        <span class="title">
	            Galerija
	        </span>
			<ul class="recent_gallery">
				<?php
				    echo do_shortcode( '[instagram-feed]' );
				?>
			</ul>
		</div>
	</div>
</aside>
<!-- /sidebar -->
