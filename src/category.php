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
                            <div class="post-wrap">
                                <div style="height: 500px; background-image:url('<?php echo wp_get_attachment_url( get_post_thumbnail_id() );?>'); background-repeat: no-repeat; background-size: 100%;">
                                </div>
                                <div class="inner">
                                    <div class="inner-wrap">
                                        <div class="inner-cnt">
                                            <div class="cnt-wrap">
                                                <div class="post-cat">

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
