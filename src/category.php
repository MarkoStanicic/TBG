<?php get_header(); ?>

	<main role="main" aria-label="Content">
		<!-- section -->
		<section>
			<div class="container">
                <div class="col-sm-9">
                    <h1><?php _e( 'Category: ', 'html5blank' ); single_cat_title(); ?></h1>

                    <?php get_template_part('loop'); ?>

                    <?php get_template_part('pagination'); ?>
                </div>
                <div class="col-sm-3">
                    <?php get_sidebar(); ?>
                </div>
            </div>

		</section>
		<!-- /section -->
	</main>

<?php get_footer(); ?>
