<?php
/**
 * The Footer template
 *
 * @package WordPress
 * @subpackage TBG
 * @since TBG 1.0
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
                    <div class="cnt-header">
                        <div class="cnt-title">
                            <h3>
                                Poslednje
                            </h3>
                        </div>
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
	                    echo do_shortcode( '[instagram-feed]' );
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
                            <div  data-width="200px" class="fb-like" data-href="https://www.facebook.com/thebelgradeguide/?ref=br_rs" data-layout="standard" data-action="like" data-size="small" data-show-faces="true" data-share="true">
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div><!-- . / end Footer -->
