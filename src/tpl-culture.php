<?php
/**
 * Template Name: Culture Page Template
 *
 */
get_header(); ?>

<main role="main" aria-label="Content">
    <!-- section -->
    <section class="category">
        <?php
//        $category = get_the_category( 5, 21, 22, 23 );
//        $categoryCategory = $category[21]->cat_name;

        $categories = get_the_category(5);
        $category_id = $categories[5]->cat_name;


        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
        $args = array(
            'cat' => 5,
            'posts_per_page' => 5,
            'include'  => array( 5, 21, 22, 23 ),
//            'cat_name'  => array( 5, 21, 22, 23 ),
            'paged' => $paged
        );
        // The Query
        query_posts( $args );
        ?>
        <!-- Slider -->
        <div id="pages-slider">
            <div class="flexslider">
                <ul class="col-md-12 slides">
                    <?php
                    //== get meta data for category
                    // $key = the_field('slider_culture_section');
                    // $slideKey = "Number of Slides in culture Section";
                    //== set category id
                    $cat_id_slider = the_field('slider_culture_section');
                    //== set slide number
                    $slide_num = the_field('number_of_slides_in_culture_section');
                    //== arguments
                    $args = array(
                        'posts_per_page' => $slide_num,
                        'cat' => $cat_id_slider
                    );
                    query_posts($args);
                    while (have_posts()) : the_post();
                        ?>
                        <li>
                            <div class="post-wrap">
                                <div class="thumb" style="height: 450px; background-image:url('<?php echo wp_get_attachment_url( get_post_thumbnail_id() );?>');"></div>
                                <div class="inner">
                                    <div class="inner-wrap">
                                        <div class="inner-cnt">
                                            <div class="cnt-wrap">
                                                <div class="post-cat">
                                                    <span class="thumbCategory">
                                                        <?php echo get_cat_name($category_id);?>
                                                    </span>
                                                </div>
                                                <!-- post title -->
                                                <h3 class="title">
                                                    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
                                                </h3>
                                                <!-- /post title -->
                                                <!-- post details -->
                                                <ul class="post-data">
                                                    <li>
                                                        <span>By <?php the_author_posts_link(); ?></span>
                                                        <span><i class="fa fa-clock-o"></i> <?php echo get_post_time('F d, Y.'); ?></span>
                                                    </li>
                                                </ul>
                                                <!-- /post details -->
                                                </span>
                                                <button class="readmore" href="<?php get_permalink(); ?>">READ MORE</button>
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
            <!-- /Slider -->
        </div>

        <div class="container">
            <div class="col-sm-9">
	            <?php get_template_part('loop', 'culture'); ?>
            </div>
            <div class="col-sm-3">
	            <?php get_sidebar(); ?>
            </div>
        </div>

    </section>
    <!-- /section -->
</main>

<?php
// Get Foot
get_footer(); ?>
