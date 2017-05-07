<!-- start second section -->
<section class="second-section">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="sectionTitle">
            <span class="title">
                Vesti iz nocnog zivota
            </span>
                </div>
                <div class="row">
                    <?php
                    //== set category id
                    $cat_id = 4;
                    //== arguments
                    $args = array(
                        'posts_per_page' => 3,
                        'cat' => $cat_id,
                        'offset'=> 8
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
        </div>
    </div>
</section><!-- . / end second section -->