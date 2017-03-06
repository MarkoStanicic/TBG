<?php
/**
 * Template Name: Home Page Template
 *
 */
get_header();
?>
<div id="home" class="">

    <?php
        //== start first section (one)
        get_template_part('partials/home-page/section', 'one');
        //== start second section (two)
        get_template_part('partials/home-page/section', 'two');
        //== start third section (three)
        get_template_part('partials/home-page/section', 'three');
    ?>
    
</div>
<div class="clearfix"></div>

<?php
    // Get Foot
    get_footer();
    get_template_part('content-footer');
?>