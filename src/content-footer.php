<?php
/**
 * The Footer template
 *
 * @package WordPress
 * @subpackage KUD
 * @since KUD 1.0
 */
?>

<div class="footer pY40">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-xs-12">
                <h2>
                    The Belgrade Guide
                </h2>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid architecto cum cupiditate
                    dolorem ea esse est harum labore magni maxime minima molestias non, perspiciatis porro possimus
                    quaerat reiciendis rerum tempora? Look around you. You'll see two councilmen, a union official, couple off-duty cops and a judge. I wouldn't have a second's hesitation of blowing your head off in front of them.
                </p>
                <div class="cnt-header pY20">
                    <div class="cnt-title">
                        <h3>
                            Kontakt
                        </h3>
                    </div>
                </div>
                <ul>
                    <li>
                        <i class="fa fa-map-marker"></i>
                        Jovana Cvijica 20, Beograd
                    </li>
                    <li>
                        <i class="fa fa-phone"></i>
                        0113456789
                    </li>
                    <li>
                        <i class="fa fa-envelope-o"></i>
                        <a href="mailto:info@thebelgradeguide.com?Subject=Mail%20from%20belgradeguide">info@thebelgradeguide.com</a>
                    </li>
                </ul>
            </div>
            <div class="col-md-4 col-xs-12">
                <div class="footerWidget">
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
                                <div class="thumb">
                                    <a class="img" href="<?php the_permalink() ?>">
                                        <img src="<?php the_post_thumbnail_url(); ?>">
                                    </a>
                                </div>
                                <div class="cnt">
                                    <h4>
                                        <a class="title" href="<?php the_permalink() ?>">
                                            <?php the_title(); ?>
                                        </a>
                                    </h4>
                                    <div class="getAuthor">
                                        <span>
                                            <?php
                                            echo 'By ';
                                            echo the_author_posts_link();
                                            ?>
                                        </span>
                                    </div>
                                    <div class="postTime">
                                         <span>
                                            <?php
                                            echo ' &nbsp; / &nbsp; <i class="fa fa-clock-o"></i> ';
                                            echo get_post_time('F d, Y.');
                                            ?>
                                        </span>
                                    </div>
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
                                <div class="thumb">
                                    <a class="img" href="<?php the_permalink() ?>">
                                        <img src="<?php the_post_thumbnail_url(); ?>">
                                    </a>
                                </div>
                                <div class="cnt">
                                    <h4>
                                        <a class="title" href="<?php the_permalink() ?>">
                                            <?php the_title(); ?>
                                        </a>
                                    </h4>
                                    <div class="getAuthor">
                                        <span>
                                            <?php
                                            echo 'By ';
                                            echo the_author_posts_link();
                                            ?>
                                        </span>
                                    </div>
                                    <div class="postTime">
                                         <span>
                                            <?php
                                            echo ' &nbsp; / &nbsp; <i class="fa fa-clock-o"></i> ';
                                            echo get_post_time('F d, Y.');
                                            ?>
                                        </span>
                                    </div>
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
            </div>
            <div class="col-md-4 col-xs-12">
                <div class="gallery-foot">
                    <div class="cnt-header">
                        <div class="cnt-title">
                            <h3>
                                Galerija
                            </h3>
                        </div>
                    </div>
                    <ul>
                        <?php
                        $args = array(
                            'showposts' => '8',
                            'cat' => 3
                        );
                        // The Query
                        query_posts($args);

                        // The Loop
                        while (have_posts()) : the_post();
                            ?>
                            <li class="recentPhotos">
                                <div class="tumb">
                                    <a data-fancybox="images" data-caption="My caption" href="<?php the_permalink() ?>">
                                        <?php the_post_thumbnail(); ?>
                                    </a>
                                </div>
                            </li>
                            <?php
                        endwhile;
                        // Reset Query
                        wp_reset_query();
                        ?>
                    </ul>
                </div>
                <div class="clearfix"></div>
                <div class="social-footer pY20">
                    <div class="cnt-header">
                        <div class="cnt-title">
                            <h3>
                                Pratite nas
                            </h3>
                        </div>
                    </div>
                    <ul>
                        <li>
                            <a href="#">
                                <span class="fa fa-facebook"></span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="fa fa-instagram"></span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="fa fa-pinterest"></span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div><!-- . / end Footer -->
