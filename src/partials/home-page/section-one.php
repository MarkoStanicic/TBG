<!-- start first section -->
<section class="first-section pY40">
    <div class="container">
        <?php  the_field('slider_first_section');?>
        <div class="row top">
            <div class="col-md-7 col-sm-7 col-xs-12 column">
                <div class="flexslider">
                    <ul class="slides">
                        <?php
                            //== get acf data for category
                            $key = the_field('slider_first_section');
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
                    //== set category id
                    $cat_id_for_second = 23;
                    //== arguments
                    $args = array(
                        'posts_per_page' => 1,
                        'cat' => $cat_id_for_second
                    );
                    query_posts($args);
                    while (have_posts()) : the_post();
                ?>
                <a href="<?php the_permalink() ?>" class="thumbHolder">
                    <span class="thumbShadow">
                        <span class="thumbCategory">
                            <?php echo get_cat_name( $cat_id_for_second ) ?>
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
                //== set category id
                $cat_id_for_bottom = 23;
                //== arguments
                $args = array(
                    'posts_per_page' => 4,
                    'cat' => $cat_id_for_bottom,
                    'offset'=> 2
                );
                query_posts($args);
                while (have_posts()) : the_post();
            ?>
            <a href="<?php the_permalink() ?>" class="thumbHolder col-md-3 col-sm-3 col-xs-12 column">
                <span class="thumbShadow">
                    <span class="thumbCategory">
                        <?php echo get_cat_name( $cat_id_for_bottom ) ?>
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