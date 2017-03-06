<!-- start section four -->
<section class="four-section pY40">
    <div class="container">
    	<div class="sectionTitle">
            <span class="title">
                Random Vesti
            </span>
        </div>
        <div class="row clearfix">
            <?php
           		//== arguments
            	$args = array(
            		'post_type' => 'post',
	                'posts_per_page' => 12,
	                'orderby' => 'rand'
            	);
	            query_posts($args);
	            while (have_posts()) : the_post();
        	?>
	        <div class="col-sm-2 smallPosts">
	            <a href="<?php the_permalink() ?>" class="thumbHolder">
	                <span class="thumbShadow">
	                    <span class="thumbTitle">
	                    	<?php the_title(); ?>
	                    </span>
	                </span>
	                <img src="<?php the_post_thumbnail_url(); ?>" class="thumb">
	            </a>
	        </div>
	        <?php 
	            endwhile;
	            wp_reset_query();
	        ?>
        </div>
    </div>
</section><!-- . / end section four -->


<style type="text/css">
.four-section .col-sm-2 {
	padding: 0 5px;
}
.four-section .col-sm-2:first-child,
.four-section .col-sm-2:nth-child(7) {
	padding-left: 0;
}
.four-section .col-sm-2:last-child,
.four-section .col-sm-2:nth-child(6) {
	padding-right: 0;
}

.smallPosts {
	margin-bottom: 40px;
}
.smallPosts a {
	height: 120px;
	overflow: hidden;
}
.smallPosts a .thumbTitle {
	font-size: 11px;
	width: 160px;
	white-space: nowrap;
	overflow: hidden;
	text-overflow: ellipsis;

}
</style>