<?php
/**
 * Template Name: Home Page Template
 *
 */
get_header();
?>

<div class="container">
    <div class="row">
        <?php if (have_posts()): while (have_posts()) : the_post(); ?>

            <!-- article -->
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                <?php the_content(); ?>

                <?php comments_template( '', true ); // Remove if you don't want comments ?>

                <br class="clear">

                <?php edit_post_link(); ?>

            </article>
            <!-- /article -->

        <?php endwhile; ?>

        <?php else: ?>

            <!-- article -->
            <article>

                <h2><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h2>

            </article>
            <!-- /article -->

        <?php endif; ?>
    </div>


</div>
<div class="container">
    <?php get_sidebar(); ?>
</div>





<?php
// Get Foot
get_footer();
get_template_part('content-footer');
?>
