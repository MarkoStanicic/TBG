<!-- sidebar -->
<aside class="sidebar sticky single" role="complementary">
	<div class="sectionTitle">
        <span class="title">
        	Kategorije
        </span>
    </div>
	<?php
		$args = array(
			'child_of' => $cat
		);
		$categories = get_categories( $args );
		echo '<ul class="categories">';
		foreach($categories as $category) {
	    	echo '<li><a href="' . get_category_link( $category->term_id ) . '" title="' . sprintf( __( "View all posts in %s" ), $category->name ) . '" ' . '>' . $category->name.'</a></li>';

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
			echo '<li>';
				echo '<a href="' . get_tag_link ($tag->term_id) . '" data-id="' . $tag->term_id . '" rel="tag">' . $tag->name . '</a>';
			echo '</li>';
		}
		echo '</ul>';
	?>
	<div class="side-gallery">
		<div class="sectionTitle">
	        <span class="title">
	            Galerija
	        </span>
		</div>
		<ul class="recent_gallery">
			<?php
			    echo do_shortcode( '[instagram-feed]' );
			?>
		</ul>
	</div>
</aside><!-- . / end sidebar -->
