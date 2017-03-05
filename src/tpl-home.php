<?php
/**
 * Template Name: Home Page Template
 *
 */
get_header();
?>
<div id="home" class="">

    <!-- start first section -->
    <section class="first-section pY40">
        <div class="container">
            <!-- start first row -->
            <div class="row top">

                <div class="col-md-7 col-sm-7 col-xs-12 column">
                    <div class="flexslider">
                        <ul class="slides">
                            <?php
                                //== get meta data for category
                                $key = "Slider First Section";
                                $slideKey = "Number of Slides in First Section";
                                //== set category id
                                $cat_id = get_post_meta($post->ID, $key, true);
                                //== set slide number
                                $slide_num = get_post_meta($post->ID, $slideKey, true);
                                //== arguments
                                $args = array(
                                    'posts_per_page' => $slide_num,
                                    'cat' => $cat_id
                                );
                                query_posts($args);
                                while (have_posts()) : the_post();
                            ?>

                            <li>
                                <a href="<?php the_permalink() ?>" class="thumbHolder">
                                    <span class="thumbShadow">
                                        <span class="thumbCategory">
                                            <?php echo get_cat_name( $cat_id ) ?>
                                        </span>
                                        <span class="thumbTitle">
                                        <?php
                                            the_title();
                                        ?>
                                        </span>
                                    </span>
                                    <img src="<?php the_post_thumbnail_url(); ?>" class="thumb">
                                </a>
                            </li>

                            <?php 
                                endwhile;
                                wp_reset_query();
                            ?>

                        </ul>
                    </div>                    
                </div>
                <div class="col-md-5 col-sm-5 col-xs-12 column">
                    <?php
                        //== get meta data for category
                        $nextToSliderkey = "Next To Slider";
                        $cat_id = get_post_meta($post->ID, $nextToSliderkey, true);
                        //== arguments
                        $args = array(
                            'posts_per_page' => 1,
                            'cat' => $cat_id
                        );
                        query_posts($args);
                        while (have_posts()) : the_post();
                    ?>
                    <a href="<?php the_permalink() ?>" class="thumbHolder">
                        <span class="thumbShadow">
                            <span class="thumbCategory">
                                <?php echo get_cat_name( $cat_id ) ?>
                            </span>
                            <span class="thumbTitle">
                            <?php
                                the_title();
                            ?>
                            </span>
                        </span>
                        <img src="<?php the_post_thumbnail_url(); ?>" class="thumb">
                    </a>
                    <?php
                        endwhile;
                        wp_reset_query();
                    ?>
                </div>
            </div><!-- . / end first row --> 
            <!-- start second row -->
            <div class="row bottom">

                <?php
                    //== get meta data for category
                    $bottomFourKey = "Bottom Four";
                    $cat_id3 = get_post_meta($post->ID, $bottomFourKey, true);
                    //== arguments
                    $args3 = array(
                        'posts_per_page' => 4
                        // 'cat' => $cat_id3
                    );
                    query_posts($args3);
                    while (have_posts()) : the_post();
                ?>
                <a href="<?php the_permalink() ?>" class="thumbHolder col-md-3 col-sm-3 col-xs-12 column">
                    <span class="thumbShadow">
                        <span class="thumbCategory">
                            <?php echo get_cat_name( $cat_id3 ) ?>
                        </span>
                        <span class="thumbTitle">
                        <?php
                            the_title();
                        ?>
                        </span>
                    </span>
                    <img src="<?php the_post_thumbnail_url(); ?>" class="thumb">
                </a>
                <?php
                    endwhile;
                    wp_reset_query();
                ?>
            </div>
        </div>
    </section><!-- . / end first section -->
    <!-- start second section -->
    <section class="second-section">
        <div class="container">
            <div class="sectionTitle">
                <span class="title">
                    Vesti iz nocnog zivota
                </span>
            </div>
            <div class="row">
                <?php
                    //== set category id
                    // $cat_id = 23;
                    //== arguments
                    $args = array(
                        'posts_per_page' => 3
                        // 'cat' => $cat_id,
                        // 'offset'=> 8
                    );
                    query_posts($args);
                    while (have_posts()) : the_post();
                ?>
                <a href="<?php the_permalink() ?>" class="thumbHolder col-sm-4 column">
                    <span class="thumbCategory">
                        <?php echo get_cat_name( $cat_id ) ?>
                    </span>
                    <img src="<?php the_post_thumbnail_url(); ?>" class="thumb">
                    <div class="cnt">
                        <span class="thumbTitle">
                            <?php
                                the_title();
                            ?>
                        </span>
                        <span class="getAuthor">
                            <?php
                                echo 'By ';
                                echo '<span>' . get_the_author_link() . '</span>';
                            ?>
                        </span>
                        <span class="postTime">
                            <?php
                                echo ' / ';
                                echo get_post_time('F d, Y.');
                            ?>
                        </span>
                        <p class="clearfix">
                            <?php echo wp_trim_words( get_the_content(), 40, '...' ); ?>
                        </p>
                        <button href="<?php get_permalink(); ?>">READ MORE</button>

                    </div>
                </a>
                <?php
                    endwhile;
                    wp_reset_query();
                ?>
            </div>
        </div>
    </section><!-- . / end second section -->
    <!-- start third section -->
    <section class="third-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-7 column">
                    <div class="sectionTitle">
                        <span class="title">
                            Poslednji Postovi
                        </span>
                    </div>
                    <?php
                        //== set category id
                        $cat_id = 23;
                        //== arguments
                        $args = array(
                            'posts_per_page' => 5,
                            'cat' => $cat_id
                        );
                        query_posts($args);
                        while (have_posts()) : the_post();
                    ?>
                    <div class="thumbHolder">
                        <div class="imgHolder">
                            <a href="<?php the_permalink() ?>">
                                <img src="<?php the_post_thumbnail_url(); ?>" class="thumb">
                            </a>
                            <span class="thumbCategory">
                                <?php echo get_cat_name( $cat_id ) ?>
                            </span>
                        </div>
                        <div class="cnt">
                            <header>
                                <span class="getAuthor">
                                    <?php
                                        echo 'By ';
                                        echo the_author_posts_link();
                                    ?>
                                </span>
                                <span class="postTime">
                                    <?php
                                        echo ' / <i class="fa fa-clock-o"></i> ';
                                        echo get_post_time('F d, Y.');
                                    ?>
                                </span>
                                <span class="postViews">
                                    <?php
                                        echo ' / <i class="fa fa-eye"></i> ';
                                        echo getPostViews(get_the_ID());
                                    ?>
                                </span>
                                <span class="commentNum">
                                    <?php
                                        echo ' / <i class="fa fa-comment-o"></i> ';
                                        echo comments_number( '0', '1', '%' );
                                    ?>
                                </span>
                            </header>
                            <div class="textCnt">
                                <span class="thumbTitle">
                                    <a href="<?php the_permalink() ?>">
                                        <?php the_title(); ?>
                                    </a>
                                </span>
                                <p class="clearfix">
                                    <?php echo wp_trim_words( get_the_content(), 40, '...' ); ?>
                                </p>
                                <button href="<?php get_permalink(); ?>">READ MORE</button>
                            </div>
                        </div>                            
                    </div>
                    <?php
                        endwhile;
                        wp_reset_query();
                    ?>
                </div>
                <div class="col-sm-5 column sidebar sticky">
                    <div class="sidebarWidget">
                        <div class="sectionTitle">
                            <ul>
                                <li>
                                    <a href="javascript:void(0)" class="active" id="show_recent">
                                        Poslednje
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)" id="show_popular">
                                        Popularno
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)" id="show_comments">
                                        Komentari
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div id="recent" class="toggle">
                            <?php
                                //== arguments
                                $args = array(
                                    'posts_per_page' => 3
                                );
                                query_posts($args);
                                while (have_posts()) : the_post();
                            ?>
                            <div class="flex">
                                <div>
                                    <a class="img" href="<?php the_permalink() ?>">
                                        <img src="<?php the_post_thumbnail_url(); ?>" class="thumb">
                                    </a>
                                </div>
                                <div>
                                    <a class="title" href="<?php the_permalink() ?>">
                                        <?php the_title(); ?>
                                    </a>
                                    <span class="getAuthor">
                                        <?php
                                            echo 'By ';
                                            echo the_author_posts_link();
                                        ?>
                                    </span>
                                    <span class="postTime">
                                        <?php
                                            echo ' / <i class="fa fa-clock-o"></i> ';
                                            echo get_post_time('F d, Y.');
                                        ?>
                                    </span>
                                </div>
                            </div>

                            

                            <?php
                                endwhile;
                                wp_reset_query();
                            ?>
                        </div>
                        <div id="popular" class="toggle hide">
                            
                            <?php 
                                $popularpost = new WP_Query( 
                                    array( 
                                        'posts_per_page' => 10,
                                        'meta_key' => 'wpb_post_views_count',
                                        'orderby' => 'meta_value_num',
                                        'order' => 'DESC'  
                                    ) 
                                );
                                while ( $popularpost->have_posts() ) : $popularpost->the_post();
                            ?>
                            <div class="flex">
                                <div>
                                    <a class="img" href="<?php the_permalink() ?>">
                                        <img src="<?php the_post_thumbnail_url(); ?>" class="thumb">
                                    </a>
                                </div>
                                <div>
                                    <a class="title" href="<?php the_permalink() ?>">
                                        <?php the_title(); ?>
                                    </a>
                                    <span class="getAuthor">
                                        <?php
                                            echo 'By ';
                                            echo the_author_posts_link();
                                        ?>
                                    </span>
                                    <span class="postTime">
                                        <?php
                                            echo ' / <i class="fa fa-clock-o"></i> ';
                                            echo get_post_time('F d, Y.');
                                        ?>
                                    </span>
                                </div>
                            </div>
                            <?php
                                endwhile;
                            ?>

                        </div>
                        <div id="comments" class="toggle hide">
                            <?php //the_widget( 'WP_Widget_Recent_Comments', $instance, $args ); ?>
                        </div>
                    </div>
                    <div class="sidebarWidget">
                        <div class="sectionTitle">
                            <ul>
                                <li>
                                    <a href="javascript:void(0);" class="active noCursor" id="show_recent">
                                        Povezimo se
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <ul class="clearfix sidebarSocial">
                            <li class="facebook">
                                <a target="_blank" href="http://facebook.com/">
                                    <div class="social-icon">
                                        <i class="fa fa-facebook"></i>
                                    </div>
                                    <div class="data">
                                        <div class="counter">147</div>
                                        <div class="text">Followers</div>
                                    </div>
                                </a>
                            </li>
                            <li class="instagram">
                                <a target="_blank" href="http://instagram.com/">
                                    <div class="social-icon">
                                        <i class="fa fa-instagram"></i>
                                    </div>
                                    <div class="data">
                                        <div class="counter">547</div>
                                        <div class="text">Followers</div>
                                    </div>
                                </a>
                            </li>
                            <li class="pinterest">
                                <a target="_blank" href="http://pinterest.com/">
                                    <div class="social-icon">
                                        <i class="fa fa-pinterest"></i>
                                    </div>
                                    <div class="data">
                                        <div class="counter">78</div>
                                        <div class="text">Followers</div>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- start third section -->
</div>
<div class="clearfix"></div>



<?php
    // Get Foot
    get_footer();
    get_template_part('content-footer');
?>