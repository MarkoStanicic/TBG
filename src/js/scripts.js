(function (root, $, undefined) {
    'use strict';

    $(function () {

        //== Flexslider
        $(window).on("load", function (e) {
            $('#slider-home .flexslider, #slider-category .flexslider').flexslider({
                animation: 'slide',
                controlNav: false,
                directionNav: true,
            });
            $('#carousel').flexslider({
                animation: "slide",
                controlNav: false,
                animationLoop: false,
                slideshow: false,
                itemWidth: 210,
                itemMargin: 5,
                asNavFor: '#slider'
            });

            $('#slider').flexslider({
                animation: "slide",
                controlNav: false,
                animationLoop: false,
                slideshow: false,
                sync: "#carousel"
            });
        });

        //== Sticky Sidebar
        var getSticky = $('.sticky');
        if (getSticky.length) {
            var stickyOffsetTop = getSticky.offset().top,
                stickyOffsetLeft = getSticky.offset().left,
                stickyWidth = getSticky.width();
            $(window).scroll(function () {
                if ($(window).scrollTop() > stickyOffsetTop) {
                    getSticky.css({
                        'position': 'fixed',
                        'top': '-40px',
                        'left': stickyOffsetLeft,
                        'overflow': 'auto',
                        'height': 'calc(100% + 40px)',
                        'width': 'calc(' + stickyWidth + 'px + 30px)',
                        'margin-left': '-15px',
                        'padding': '0 15px'
                    });
                } else {
                    getSticky.css({
                        'position': 'static',
                        'height': 'auto'
                    });
                }
            });
        }

        //== Header Image Functionality
        var url,
            hour = new Date().getHours(),
            imgWrapper = $('.img-wrapper');

        if (hour > 6 && hour < 18) {
            imgWrapper.css({
                'background-image': 'url("<?php echo get_template_directory_uri();?>/img/torn-page.jpg")'
            });
        } else {
            imgWrapper.css({
                'background-image': 'url(http://localhost/welovebelgrade/wp-content/themes/TBG/src/img/header/belgrade-4.jpg)'
            });
        }

        // = Toggle Search Field
        $('.search a').on('click', function () {
            $('.search-input').fadeToggle(300);
        });

        //== Sidebar Toggle Sections
        $('.sidebar .sectionTitle a, .footerWidget .sectionTitle a').click(function () {
            var id = $(this).attr('id');
            id = id.split('_');
            $('.sidebar .sectionTitle a, .footerWidget .sectionTitle a').removeClass('active');
            $(this).addClass('active');
            $('.sidebar .toggle, .footerWidget .toggle').addClass('hide');
            $('.sidebar .toggle#, .footerWidget .toggle#' + id[1]).removeClass('hide');
        });

        $("[data-fancybox]").fancybox({
            // Options will go here
        });

        $(".acf-map").on('click', function() {

            $.fancybox.open({
                src  : '#hidden-content-1',
                type : 'inline'
            });

        });

    });

    $ = jQuery.noConflict();


}(this, jQuery));