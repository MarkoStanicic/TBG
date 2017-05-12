<?php get_header(); ?>

	<main role="main" aria-label="Content">
		<!-- section -->
		<section class="category">
			<div class="flexslider">
				<ul class="slides">
					<?php
					//== get meta data for category
					// $key = the_field('slider_first_section');
					// $slideKey = "Number of Slides in First Section";
					//== set category id
					$cat_id_slider = the_field('slider_first_section');
					//== set slide number
					$slide_num = the_field('number_of_slides_in_first_section');
					//== arguments
					$args = array(
						'posts_per_page' => $slide_num,
						'cat' => $cat_id_slider
					);
					query_posts($args);
					while (have_posts()) : the_post();
						?>
						<li>
							<div>

							</div>
							<div style="height: 500px; background-image:url('<?php echo wp_get_attachment_url( get_post_thumbnail_id() );?>'); background-repeat: no-repeat; background-size: 100%;"></div>
							<a href="<?php the_permalink() ?>" class="thumbHolder">
                                <span class="thumbShadow">
                                    <span class="thumbCategory">
                                        <?php echo get_cat_name( $cat_id_slider ) ?>
                                    </span>
                                    <span class="thumbTitle">
                                    <?php
                                    the_title();
                                    ?>
                                    </span>
                                </span>
								<!--<img src="<?php /*the_post_thumbnail_url(); */?>" class="thumb">-->
							</a>
						</li>
						li.
						<?php
					endwhile;
					wp_reset_query();
					?>
				</ul>
			</div>
			<div class="container">
                <div class="col-sm-9">
	                <?php
	                $category = get_the_category();
	                $firstCategory = $category[0]->cat_name;
	                ?>
	                <ul class="tbg-breadcrumb">
		                <li>
			                <span class="cat"><?php echo $firstCategory; ?></span>
			                <span class="bred-elem">Home</span>
			                <span class="bred-elem"><?php echo $firstCategory; ?></span>
		                </li>
	                </ul>

	                <?php get_template_part('loop', 'category'); ?>

	                <div class="col-sm-12 text-center">
		                <?php get_template_part('pagination'); ?>
	                </div>

                </div>
                <div class="col-sm-3">
                    <?php get_sidebar(); ?>
                </div>
            </div>

		</section>
		<!-- /section -->
	</main>

<?php get_footer(); ?>
