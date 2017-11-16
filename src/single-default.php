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
							<div class="col-sm-8">
								<?php the_content(); // Dynamic Content ?>
							</div>
						</div>

						<div class="contact-details">
							<div class="col-sm-4">
								<div class="widget">
									<?php

									if( have_rows('widget') ):

										while( have_rows('widget') ) : the_row();

											// get layout
											$layout = get_row_layout();


											// layout_1
											if( $layout === 'postwidget' ) {

												$value = get_sub_field('naslov');
												$value1 = get_sub_field('adresa');

												// layout_2
											} else {
												echo 'empty';
											}
										endwhile;
									endif;
									?>
									<ul>
										<li><?php echo $value . '' ?></li>
										<li><?php echo $value1 . '' ?></li>
									</ul>

									<?php

									$location = get_field('map');

									if( !empty($location) ):
										?>
										<div class="acf-map">
											<div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div>
											<!--<a data-fancybox data-src="#hidden-content-1" href="javascript:;">
												<i class="fa fa-search-plus"></i>
												<div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div>
											</a>-->
										</div>
									<?php endif; ?>	
									<?php

									if( have_rows('radnovreme') ):

										while( have_rows('radnovreme') ) : the_row();

											$title = get_sub_field('title');
											$pon = get_sub_field('ponedeljak');
											$uto = get_sub_field('utorak');
											$sre = get_sub_field('sreda');
											$cet = get_sub_field('cetvrtak');
											$pet = get_sub_field('petak');
											$sub = get_sub_field('subota');
											$ned = get_sub_field('nedelja');

										endwhile;

									endif;
									?>
									<ul>
										<li><?php echo $title . '' ?></li>
										<li><?php echo $pon . '' ?></li>
										<li><?php echo $uto . '' ?></li>
										<li><?php echo $sre . '' ?></li>
										<li><?php echo $cet . '' ?></li>
										<li><?php echo $pet . '' ?></li>
										<li><?php echo $sub . '' ?></li>
										<li><?php echo $ned . '' ?></li>
									</ul>
									<?php

									if( have_rows('info') ):

										while( have_rows('info') ) : the_row();

											$web = get_sub_field('website');
											$face = get_sub_field('facebook');
											$email = get_sub_field('email');
											$phone = get_sub_field('telephone');

										endwhile;

									endif;
									?>
									<ul>
										<li>Website: <a href=" <?php echo $web . '' ?>"> <?php echo $web . '' ?></a></li>
										<li><i class="fa fa-facebook-square" aria-hidden="true"></i><a target="_blank" href="<?php echo $face . '' ?>"><?php echo $face . '' ?></a></li>
										<li><i class="fa fa-envelope-square" aria-hidden="true"></i><a href="mailto: <?php echo $email . '' ?>"> <?php echo $email . '' ?></a></li>
										<li><i class="fa fa-phone-square" aria-hidden="true"></i> <a href='tel:<?php echo $phone . '' ?>'></a><?php echo $phone . '' ?></li>
									</ul>
								</div>
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
