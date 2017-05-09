<?php
/**
 * Template Name: Hotels Page Template
 *
 */
get_header();
?>

<section>
    <div id="container-async" class="container">
        <div class="row">

            <?php
            echo vb_filter_posts_sc();
            ?>
            <?php echo do_shortcode('[ajax_filter_posts per_page="1"]'); ?>




            </div>
    </div>
</section>

<?php
// Get Foot
get_footer();
?>
