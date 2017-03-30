<?php
/**
 * Template Name: Contact Page Template
 *
 */
get_header();?>


    <div id="contact">
        <div class="container">

            <div class="col-sm-7">

                <?php
                    echo do_shortcode( '[contact-form-7 id="324" title="Kontakt Stranica"]' );
                ?>

            </div>

            <div class="col-sm-4 col-sm-push-1">

                <?php
                    get_sidebar();
                ?>

            </div>

        </div>
    </div>



<?php get_footer(); ?>
