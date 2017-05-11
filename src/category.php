<?php get_header(); ?>

	<main role="main" aria-label="Content">
		<!-- section -->
		<section class="category">
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
		                </li>
	                </ul>

	                <?php get_template_part('loop', 'category'); ?>

	                <div class="col-sm-12 text-center">
		                <?php get_template_part('pagination'); ?>
	                </div>

                </div>
                <div class="col-sm-3">
                    <?php get_sidebar(); ?>
                </div>
            </div>

		</section>
		<!-- /section -->
	</main>

<?php get_footer(); ?>
