<!-- start third section -->
<section class="third-section">
    <div class="container">
        <div class="row">
            <div class="col-sm-8 column">
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
            <div class="col-sm-4 column sidebar">
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
                                    'posts_per_page' => 3,
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
    						<?php tbg_recent_comments(); ?>
                    </div>
                    <style type="text/css">
						#comments { list-style: none; font-size: 12px; color: #485358; }
						#comments li { overflow: hidden; border-top: 1px dotted #DADEE1; }
						#comments li:first-child { border: 0 none; }
						#comments li:first-child a { padding-top: 0; }
						#comments img { float: left; margin-right: 8px; } 
						#comments a { display: block; margin-bottom: 10px; padding-top: 10px; text-transform: uppercase; overflow: hidden; } 
                    </style>
                </div>
                <!-- <div class="sidebarWidget sticky"> -->
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
</section><!-- . / end third section