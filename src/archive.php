<?php
/*
Template Name: Archives
*/
get_header(); ?>

	<div class="col-sm-12 text-center">
	<?php  

	$args = array(
	'post_type'   => 'Events',
	'type'   => 'monthly',
	'orderby'   => 'date',
	'echo'   => 0,
	'date_query' => array(
		array(
		    'year'  => 2017,
		    'month' => 07
		),
	),
	);
	query_posts( $args );
	while (have_posts()) : the_post();	
	?>
	</div>
	<div class="container">
	
	<article <?php post_class(); ?>>
	<div class="col-sm-12">
		<div class="text-center">
			<?php the_date('M.'); ?>
			</div>
		<div class="row">
		<div class="col-sm-4">
			<a class="img" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
			<?php the_post_thumbnail(array(300,150)); # Declare pixel size you need inside the array ?>
			</a>
		</div>
		<div class="col-sm-8">
			<ul class="post-data">
			<li>
				<span>By <?php the_author_posts_link(); ?></span>
				<span><i class="fa fa-clock-o"></i> <?php echo get_post_time('F d, Y.'); ?></span>
				<span><i class="fa fa-eye"></i> <?php getPostViews(get_the_ID()); ?></span>
				<span><i class="fa fa-comment-o"></i> <?php echo comments_number( '0', '1', '%' ); ?></span>
			</li>
			</ul>
			<h3 class="title">
			<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
			</h3>
			<div class="category-content">
			<p class="clearfix">
				<?php echo wp_trim_words( get_the_content(), 30, '...' ); ?>
			</p>
			<div class="widget">
				<?php

				if( have_rows('event-content') ):

					while( have_rows('event-content') ) : the_row();

						// get layout
						$layout = get_row_layout();


						// layout_1
						if( $layout === 'events' ) {

							$value = get_sub_field('time_&_date');
							$value1 = get_sub_field('cena_dogadjaja');

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
				
			</div>
			<button class="readmore" href="<?php get_permalink(); ?>">READ MORE</button>
			</div>
		</div>
		</div>
		<div class="borderLine"></div>
	</div>
	</article>
	<?php
	   endwhile;
	?>
	<div class="col-sm-12 text-center">
	    <?php get_template_part('pagination'); ?>
	</div>
</div><!-- #container -->
<div class="clearfix"></div>


<?php get_sidebar(); ?>
<?php get_footer(); ?>