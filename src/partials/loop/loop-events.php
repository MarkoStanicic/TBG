<div class="category">
	<div class="sectionTitle">
		<span class="title">
			<?php
				single_cat_title();
			?>
		</span>
	</div><!-- . / end section title -->
	<!-- breadcrumbs -->
	<ul class="tbg-breadcrumb">
		<li>
			<span class="bred-elem">Home</span>
			<span class="bred-elem">Kategorija: <?php  single_cat_title(); ?> </span>
		</li>
	</ul><!-- . / end breadcrumbs -->
	<?php
	   $args = array(
	       'cat'            => $cat,
		   'post_type' => 'Events',
	       'posts_per_page' => 10,
	       'orderby'        => 'date',
	       'paged'          => $paged,
	   );
	   query_posts( $args );
	   while (have_posts()) : the_post();
	   ?>
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

</div>
