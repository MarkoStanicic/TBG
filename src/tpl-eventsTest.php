<?php
/*
Template Name: events
*/
?>
<?php get_header(); ?>

 

<?php
// Get the paged variable and use it in the custom query.
// (see: http://codex.wordpress.org/Pagination ).
$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
 
// Example query arguments.
$args = array(
 
    // set the date pagination to 'monthly'
    'date_pagination_type' => 'monthly', // 'yearly', 'monthly', 'daily'
    'paged'                => $paged,
 
    // Add your own WP_Query arguments here
    'post_type'            => array( 'Events' ),
    'ignore_sticky_posts'  => true,
);
 
// The custom query.
$the_query = new WP_Query( $args );
 
// Variable $the_query is the query object.
// Don't forget to add the query object to the label functions when using a custom query;
?>
 
<?php if ( $the_query->have_posts() ) : ?>
 <div class="col sm-12 text-center">
	<h2>
		<?php
		// Echo current date with format 'F Y' ( e.g. November 2010 ).
		echo km_dp_get_current_date_label('F Y', $the_query);
		?>
	</h2>
 </div>
    
    <!-- The custom query Loop -->
    <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
 <div class="category">
	<div class="container">
	
	<article <?php post_class(); ?>>
	<div class="col-sm-12">
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
			 <a class="readmore" href="<?php the_permalink(); ?>">
                        	Pročitajte više
                        </a>
			</div>
		</div>
		</div>
		<div class="borderLine"></div>
	</div>
	</article>
</div>	
 </div>
        
	<?php
	   endwhile;
	?>

	
 
    <?php
    // Date Pagination.
 
    // Default labels.
    $next_label = 'Previous Page';
    $prev_label = 'Next Page';  
 
    // Check if functions exists (plugin is activated).
    if ( function_exists( 'km_dp_get_next_date_label' ) ) {
        $next_label = km_dp_get_next_date_label( 'F Y', $the_query );
    }   
 
    if ( function_exists( 'km_dp_get_previous_date_label' ) ) {
        $prev_label = km_dp_get_previous_date_label( 'F Y', $the_query );
    }
    ?>

    	<div class="col-sm-12 text-center">
			<!-- WordPress core pagination functions (see the Codex) -->
		<?php
		// Set max_num_pages for next_posts_link() when using a custom query (see the Codex).
		// Get the max_num_pages from the custom query object ($the_query)
		next_posts_link( 'Prethodni Dogadjaji: ' . $next_label, $the_query->max_num_pages );
		previous_posts_link( 'Naredni Dogadjaji: ' . $prev_label );
		?>
	</div>
 
    
 
    <?php wp_reset_postdata(); ?>
<?php else:  ?>
    <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>
<?php get_footer(); ?>