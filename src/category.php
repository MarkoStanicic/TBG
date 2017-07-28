<?php get_header(); ?>
<main role="main" aria-label="Content">
    <section class="category">
        <!-- slider -->
        <div id="pages-slider">
            <div class="flexslider">
                <ul class="col-md-12 slides">
                    <?php
                       $args = array(
                           'cat'            => $cat,
                           'posts_per_page' => 5,
                           'orderby'        => 'rand',
                           'paged'          => $paged,
                       );
                       query_posts( $args );
                       while (have_posts()) : the_post();
                       ?>
                       <li <?php post_class(); ?>>
                           <div class="post-wrap">
                               <div
                                    class="thumb"
                                    style="height: 450px; background-image:url('<?php echo wp_get_attachment_url( get_post_thumbnail_id() );?>');"
                                ></div>
                               <div class="inner">
                                   <div class="inner-wrap">
                                       <div class="inner-cnt">
                                           <div class="cnt-wrap">
                                               <div class="post-cat">
                                                   <span class="thumbCategory">
                                                       <?php echo get_cat_name($cat);?>
                                                   </span>
                                               </div>
                                               <h3 class="title">
                                                   <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                                                       <?php the_title(); ?>
                                                   </a>
                                               </h3>
                                               <ul class="post-data">
                                                   <li>
                                                       <span>By <?php the_author_posts_link(); ?></span>
                                                       <span><i class="fa fa-clock-o"></i> <?php echo get_post_time('F d, Y.'); ?></span>
                                                   </li>
                                               </ul>
                                               <a class="readmore" href="<?php the_permalink(); ?>">
                                                   Pročitajte više
                                               </a>
                                           </div>
                                       </div>
                                   </div>
                               </div>
                           </div>
                       </li>
                    <?php
                       endwhile;
                       wp_reset_query();
                    ?>
                </ul>
            </div>
        </div><!-- . / end slider -->
		<!-- content -->
        <div class="container">
            <div class="col-sm-9">
                <div class="col-md-12"  id="currentContent">

	            <?php
                    #get_template_part('partials/loop/loop', 'culture');
					get_template_part('partials/loop/loop');
                ?>
                </div>
				<div class="col-md-12" id="filterTagContent">
					<div class="sectionTitle">
						<span class="title">Tag Filter</span>
	                </div>
					<div id="fill"></div>
				</div>
            </div>
            <div class="col-sm-3">
	            <?php get_sidebar(); ?>
            </div>
        </div><!-- . / end content -->
    </section>
</main>

<?php get_footer(); ?>
