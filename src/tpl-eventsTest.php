<?php
/*
Template Name: events
*/
?>
<?php get_header(); ?>

		<div id="primary">
			<div id="content" role="main">
			
<?php 
	// $archive = get_post_meta_archive('showdate');
	// for custom post types use the second parameter
	$archive = get_post_meta_archive('showdate' , 'Events');
	
	$paged = (get_query_var('paged')) ? get_query_var('paged') : 1; 
	
	$temp = $wp_query;
	$wp_query= null;
	$wp_query = new WP_Query();
	
	if(!empty($archive) && isset($archive[$paged-1])) : 
		$myyear = $archive[$paged-1]->year;
		$mymonth = $archive[$paged-1]->month;
		// put leading 0 on single digit months
		$mymonth =str_pad($mymonth, 2, "0", STR_PAD_LEFT);
		$start = $myyear.'-'.$mymonth.'-01'; 
		$end = $myyear.'-'.$mymonth.'-31';
		$meta_value = array( $start, $end );
		
		$args = array(
		  'post_type' => 'Events',
		  'posts_per_page' => -1,
		  'meta_key'     => 'showdate',
		  'orderby'        => 'meta_value',
		  'order'          => 'ASC',
		  'meta_query'     => array(
		    array(
		      'key'     => 'showdate',
		      'value'   => array( $start, $end ),
		      'compare' => 'BETWEEN',
		      'type'    => 'DATE',
		    )
		  )
		);
		
		$wp_query->query($args);
		$wp_query->max_num_pages = count($archive);
?>
<h2>Events for: <?php echo date('F, Y', strtotime($start)); ?></h2> 
				<!-- the loop -->
				<?php while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>
<?php echo get_post_meta($post->ID, 'showdate',true) ?>
					<?php get_template_part( 'partials/loop/loop-events' ); ?>
					
				<?php endwhile; // end of the loop. ?>
				<!-- put your pagination function here -->
				<?php posts_nav_link(); ?>
				
				<?php else : ?>
				<h2>No current events</h2>
				<?php endif; ?>
				<?php $wp_query = null; $wp_query = $temp; ?>

			</div><!-- #content -->
		</div><!-- #primary -->

<?php get_footer(); ?>