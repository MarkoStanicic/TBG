<?php get_header(); ?>

	<main role="main" aria-label="Content">
		<!-- section -->
		<section class="category">
            <?php
            $category = get_the_category();
            $categoryCategory = $category[0]->cat_name;
            ?>
            <!-- Slider -->
			<div class="flexslider">
				<ul class="col-md-12 slides">
					<?php
					//== get meta data for category
					// $key = the_field('slider_first_section');
					// $slideKey = "Number of Slides in First Section";
					//== set category id
					$cat_id_slider = the_field('slider_category_section');
					//== set slide number
					$slide_num = the_field('number_of_slides_in_category_section');
					//== arguments
					$args = array(
						'posts_per_page' => $slide_num,
						'cat' => $cat_id_slider
					);
					query_posts($args);
					while (have_posts()) : the_post();
						?>
						<li>
                            <div class="post-wrap">
                                <div class="thumb" style="height: 450px; background-image:url('<?php echo wp_get_attachment_url( get_post_thumbnail_id() );?>');"></div>
                                <div class="inner">
                                    <div class="inner-wrap">
                                        <div class="inner-cnt">
                                            <div class="cnt-wrap">
                                                <div class="post-cat">
                                                    <span class="thumbCategory">
                                                        <?php echo $categoryCategory; ?>
                                                    </span>
                                                </div>
                                                    <!-- post title -->
                                                    <h3 class="title">
                                                        <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
                                                    </h3>
                                                    <!-- /post title -->
                                                    <!-- post details -->
                                                    <ul class="post-data">
                                                        <li>
                                                            <span>By <?php the_author_posts_link(); ?></span>
                                                            <span><i class="fa fa-clock-o"></i> <?php echo get_post_time('F d, Y.'); ?></span>
                                                        </li>
                                                    </ul>
                                                    <!-- /post details -->
                                                    </span>
                                                <button class="readmore" href="<?php get_permalink(); ?>">READ MORE</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
						</li>
						<?php
					endwhile;
					wp_reset_query();
					?>
				</ul>
			</div>
            <!-- /Slider -->
			<div class="container">
                <div class="col-sm-9">
	                <?php get_template_part('loop', 'category'); ?>
                </div>
                <div class="col-sm-3">
                    <?php get_sidebar(); ?>
                </div>
            </div>

		</section>
		<!-- /section -->
	</main>

<?php get_footer(); ?>
