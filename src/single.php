<?php get_header(); ?>

<main role="main" aria-label="Content">
	<!-- section -->
	<section class="single">
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

					<!-- post title -->
					<h1 class="single-title">
						<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
					</h1><!-- . / end post title -->

					<!-- author, date/time, views, comments -->
					<ul class="post-data">
						<li>
							<span>By <?php the_author_posts_link(); ?></span>
							<span><i class="fa fa-clock-o"></i> <?php echo get_post_time('F d, Y.'); ?></span>
							<span><i class="fa fa-eye"></i> <?php getPostViews(get_the_ID()); ?></span>
							<span><i class="fa fa-comment-o"></i> <?php echo comments_number( '0', '1', '%' ); ?></span>
						</li>
					</ul><!-- . / end author, date/time, views, comments -->

					<!-- post thumbnail -->
					<?php if ( has_post_thumbnail()) : // Check if Thumbnail exists ?>
						<a class="single-img" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
							<?php the_post_thumbnail(); // Fullsize image for the single post ?>
						</a>
					<?php endif; ?><!-- . / end post thumbnail -->

					<!-- post details --><?php /*
					<span class="date">
						<time datetime="<?php the_time('Y-m-d'); ?> <?php the_time('H:i'); ?>">
							<?php the_date(); ?> <?php the_time(); ?>
						</time>
					</span>
					<span class="author"><?php _e( 'Published by', 'html5blank' ); ?> <?php the_author_posts_link(); ?></span>
					<span class="comments"><?php if (comments_open( get_the_ID() ) ) comments_popup_link( __( 'Leave your thoughts', 'html5blank' ), __( '1 Comment', 'html5blank' ), __( '% Comments', 'html5blank' )); ?></span>
					<!-- /post details -->*/?>

					<div class="single-content">
						<?php the_content(); // Dynamic Content ?>
					</div>

					<?php /* the_tags( __( 'Tags: ', 'html5blank' ), ', ', '<br>'); // Separated by commas with a line break at the end ?>

					<p><?php _e( 'Categorised in: ', 'html5blank' ); the_category(', '); // Separated by commas ?></p>

					<p><?php _e( 'This post was written by ', 'html5blank' ); the_author(); ?></p> */?>

					<?php edit_post_link(); // Always handy to have Edit Post Links available ?>

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
