<?php
/**
 * The Footer template
 *
 * @package WordPress
 * @subpackage KUD
 * @since KUD 1.0
 */
?>
<style type="text/css">


</style>

<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <div class="col-sm-11">
                    <h2>
                        The Belgrade Guide
                    </h2>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid architecto cum cupiditate
                        dolorem ea esse est harum labore magni maxime minima molestias non, perspiciatis porro possimus
                        quaerat reiciendis rerum tempora?
                    </p>
                    <p>Look around you. You'll see two councilmen, a union official, couple off-duty cops and a judge. I wouldn't have a second's hesitation of blowing your head off in front of them. Now, that's power you can't buy. That's the power of fear.</p>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="col-sm-10">
                    <h3>
                        Poslednje vesti
                    </h3>
                    <ul>
                        <?php
                        $args = array(
                            'showposts' => '5',
                            'cat' => 3
                        );
                        // The Query
                        query_posts($args);

                        // The Loop
                        while (have_posts()) : the_post();
                            $year = get_the_time('Y');
                            $month = get_the_time('M');
                            $day = get_the_time('d');
                            ?>
                            <li class="recentPosts">
                                <div class="recentTitle">
                                    <a href="<?php the_permalink() ?>" rel="bookmark"
                                       title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a>
                                </div>
                                <small>
                                    <div class="time">
                                        <?php the_time('F jS, Y'); ?>
                                    </div>
                                </small>
                            </li>
                            <?php
                        endwhile;
                        // Reset Query
                        wp_reset_query();
                        ?>
                    </ul>
                </div>
            </div>
            <div class="col-sm-4">
                <h3>
                    Galerija
                </h3>
                <div class="social-footer">
                    <h3>
                        Pratite nas
                    </h3>
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
</footer><!-- . / end Footer -->
