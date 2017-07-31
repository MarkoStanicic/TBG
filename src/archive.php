<?php
/*
Template Name: Archives
*/
get_header(); ?>

<div id="container">
	<div id="content" role="main">
		<?php the_post(); ?>
		<h1 class="entry-title"><?php the_title(); ?></h1>
		
		<?php get_search_form(); ?>

		<?php wp_get_archives_cpt( 'post_type=Events' ); ?>

		<?php 
		$args = array(
    'post_type'    => 'your_custom_post_type',
    'type'         => 'monthly',
    'echo'         => 0
);
echo '<ul>'.wp_get_archives($args).'</ul>';

?>

	</div><!-- #content -->
</div><!-- #container -->


<?php get_sidebar(); ?>
<?php get_footer(); ?>