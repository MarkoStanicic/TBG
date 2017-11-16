<?php get_header(); ?>

<main role="main" aria-label="Content">
	<!-- section -->
	<section class="single">
		<div class="container">
			<div class="posts"></div>
			<div class="col-sm-9">
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
			<div class="col-sm-3">
				<?php get_sidebar(); ?>
			</div>
		</div>
	</section>
	<!-- /section -->
</main>

<?php get_footer(); ?>
