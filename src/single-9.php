<?php get_header(); ?>

<main role="main" aria-label="Content">
	<!-- section -->
	<section class="single single-9">
		<div class="container">
			<div class="posts"></div>
			<div class="col-sm-8">
				<?php
				$category = get_the_category();
				$firstCategory = $category[0]->cat_name;
				?>
				<ul class="tbg-breadcrumb" style="margin-bottom: 30px;">
					<li>
						<span class="cat"><?php echo $firstCategory; ?></span>
						<span class="bred-elem">Home</span>
						<span class="bred-elem"><?php echo $firstCategory; ?></span>
						<span class="bred-elem"><?php the_title(); ?></span>
					</li>
				</ul>
				<?php
				if (have_posts()): while (have_posts()) : the_post();
					//== setting post views wit post ID
					setPostViews(get_the_ID());
					wpb_set_post_views(get_the_ID());
					?>
					<!-- article -->
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<!-- post thumbnail -->
						<?php if ( has_post_thumbnail()) : // Check if Thumbnail exists ?>
						<a class="single-img" title="<?php the_title_attribute(); ?>">
							<?php the_post_thumbnail(); // Fullsize image for the single post ?>
							<h1><?php the_title(); ?></h1>
						</a>
						<?php endif; ?><!-- . / end post thumbnail -->
						<div class="col-sm-12">
							<div class="single-content">
								<div class="col-sm-12">
									<?php the_content(); // Dynamic Content ?>
								</div>
							</div>
						</div>

						<div class="clearfix"></div>

						<?php edit_post_link(); // Always handy to have Edit Post Links available ?>
						<div id="gall">
							<?php

							$images = get_field('gallery');

							if( $images ): ?>
								<div id="slider" class="flexslider">
									<ul class="slides">
										<?php foreach( $images as $image ): ?>
											<li>
												<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
											</li>
										<?php endforeach; ?>
									</ul>
								</div>
								<div id="carousel" class="flexslider">
									<ul class="slides">
										<?php foreach( $images as $image ): ?>
											<li>
												<img src="<?php echo $image['sizes']['thumbnail']; ?>" alt="<?php echo $image['alt']; ?>" />
											</li>
										<?php endforeach; ?>
									</ul>
								</div>
							<?php endif; ?>
						</div>

						<?php comments_template(); ?>

					</article>
					<!-- /article -->

				<?php endwhile; ?>

				<?php else: ?>

					<!-- article -->
					<article>

						<h1><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h1>

					</article>
					<!-- /article -->

				<?php endif; ?>
			</div>
			<div class="col-sm-4 column sidebar">
                <div class="sidebarWidgetNews">
                    <div class="sectionTitle">
                        <ul>
                            <li>
                                <a href="javascript:void(0)" class="active" id="show_recent">
                                    Poslednje
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)" id="show_popular">
                                    Popularno
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)" id="show_comments">
                                    Komentari
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div id="recent" class="toggle">
						<?php
						//== arguments
						$args = array(
							'posts_per_page' => 3
						);
						query_posts($args);
						while (have_posts()) : the_post();
							?>
                            <div class="flex">
                                <div>
                                    <a class="img" href="<?php the_permalink() ?>">
                                        <img src="<?php the_post_thumbnail_url(); ?>" class="thumb">
                                    </a>
                                </div>
                                <div>
                                    <a class="title" href="<?php the_permalink() ?>">
										<?php the_title(); ?>
                                    </a>
                                    <span class="getAuthor">
                                    <?php
                                    echo 'By ';
                                    echo the_author_posts_link();
                                    ?>
                                </span>
                                    <span class="postTime">
                                    <?php
                                    echo ' / <i class="fa fa-clock-o"></i> ';
                                    echo get_post_time('F d, Y.');
                                    ?>
                                </span>
                                </div>
                            </div>
							<?php
						endwhile;
						wp_reset_query();
						?>
                    </div>
                    <div id="popular" class="toggle hide">
						<?php
						$popularpost = new WP_Query(
							array(
								'posts_per_page' => 3,
								'meta_key' => 'wpb_post_views_count',
								'orderby' => 'meta_value_num',
								'order' => 'DESC'
							)
						);
						while ( $popularpost->have_posts() ) : $popularpost->the_post();
							?>
                            <div class="flex">
                                <div>
                                    <a class="img" href="<?php the_permalink() ?>">
                                        <img src="<?php the_post_thumbnail_url(); ?>" class="thumb">
                                    </a>
                                </div>
                                <div>
                                    <a class="title" href="<?php the_permalink() ?>">
										<?php the_title(); ?>
                                    </a>
                                    <span class="getAuthor">
                                    <?php
                                    echo 'By ';
                                    echo the_author_posts_link();
                                    ?>
                                </span>
                                    <span class="postTime">
                                    <?php
                                    echo ' / <i class="fa fa-clock-o"></i> ';
                                    echo get_post_time('F d, Y.');
                                    ?>
                                </span>
                                </div>
                            </div>
							<?php
						endwhile;
						?>
                    </div>
                    <div id="comments" class="toggle hide">
						<?php tbg_recent_comments(); ?>
                    </div>
                    <style type="text/css">
                        #comments { list-style: none; font-size: 12px; color: #485358; }
                        #comments li { overflow: hidden; border-top: 1px dotted #DADEE1; }
                        #comments li:first-child { border: 0 none; }
                        #comments li:first-child a { padding-top: 0; }
                        #comments img { float: left; margin-right: 8px; }
                        #comments a { display: block; margin-bottom: 10px; padding-top: 10px; text-transform: uppercase; overflow: hidden; }
                    </style>
                </div>
                <div class="sidebarWidgetSocial">
                    <div class="sectionTitle">
                        <ul>
                            <li>
                                <a href="javascript:void(0);" class="active noCursor" id="show_recent">
                                    Povezimo se
                                </a>
                            </li>
                        </ul>
                    </div>
                    <ul class="clearfix sidebarSocial">
                        <li class="facebook">
                            <a target="_blank" href="http://facebook.com/">
                                <div class="social-icon">
                                    <i class="fa fa-facebook"></i>
                                </div>
                                <div class="data">
                                    <div class="counter">147</div>
                                    <div class="text">Followers</div>
                                </div>
                            </a>
                        </li>
                        <li class="instagram">
                            <a target="_blank" href="http://instagram.com/">
                                <div class="social-icon">
                                    <i class="fa fa-instagram"></i>
                                </div>
                                <div class="data">
                                    <div class="counter">547</div>
                                    <div class="text">Followers</div>
                                </div>
                            </a>
                        </li>
                        <li class="pinterest">
                            <a target="_blank" href="http://pinterest.com/">
                                <div class="social-icon">
                                    <i class="fa fa-pinterest"></i>
                                </div>
                                <div class="data">
                                    <div class="counter">78</div>
                                    <div class="text">Followers</div>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
			</div>
		</div>
	</section>
	<!-- /section -->
</main>

<?php get_footer(); ?>
