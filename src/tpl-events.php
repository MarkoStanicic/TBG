<?php
/**
 * Template Name: Events Page Template
 *
 */
get_header();
?>

<section class="events">
	<?php
	echo do_shortcode( '[tribe_events]' );
	?>
</section>

<?php
// Get Foot
get_footer();
?>
