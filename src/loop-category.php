<?php if (have_posts()): while (have_posts()) : the_post(); ?>
	<div class="col-sm-12">

	<!-- article -->
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>


		<div class="col-sm-12">
			<div class="col-sm-4">

				<!-- post thumbnail -->
				<?php if ( has_post_thumbnail()) : // Check if thumbnail exists ?>
					<a class="img" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
						<?php the_post_thumbnail(array(300,150)); // Declare pixel size you need inside the array ?>
					</a>
					<span class="thumbCategory">
                            <?php echo get_cat_name() ?>
                    </span>
				<?php endif; ?>
				<!-- /post thumbnail -->
			</div>
			<div class="col-sm-8">
				<!-- post details -->
				<ul class="post-data">
					<li>
						<span>By <?php the_author_posts_link(); ?></span>
						<span><i class="fa fa-clock-o"></i> <?php echo get_post_time('F d, Y.'); ?></span>
						<span><i class="fa fa-eye"></i> <?php getPostViews(get_the_ID()); ?></span>
						<span><i class="fa fa-comment-o"></i> <?php echo comments_number( '0', '1', '%' ); ?></span>
					</li>
				</ul>
				<!-- /post details -->
				<!-- post title -->
				<h3 class="title">
					<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
				</h3>
				<!-- /post title -->
				<div class="category-content">
					<p class="clearfix">
						<?php echo wp_trim_words( get_the_content(), 30, '...' ); ?>
					</p>
					<button href="<?php get_permalink(); ?>">READ MORE</button>
				</div>
			</div>

	</article>
	<!-- /article -->

	</div>

<?php endwhile; ?>

<?php else: ?>

	<!-- article -->
	<article>
		<h2><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h2>
	</article>
	<!-- /article -->
	</div>


<?php endif; ?>