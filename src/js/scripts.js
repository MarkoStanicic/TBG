(function (root, $, undefined) {
    'use strict';

    $(function () {
        //================
        //= create array fom tag id's
        var tagArray = [];
        $('.tags li a').on('click', function(e) {
            //= clicked anchors will not take the browser to a new URL
            e.preventDefault();
            //= get $(this) element tag id || we will use this later for url updating
            var tagId = $(this).attr('data-id');

            if($(this).hasClass('active')) {
                //= remove active class
                $(this).removeClass('active');
                //= remove tag id from array
                tagArray = tagArray.filter(function(item) {
                    return item !== tagId;
                });
                console.log('tagArray removed: ', tagArray);
                //= create url
                var url = 'http://localhost:8888/Test/TBG/wp-json/wp/v2/posts?tags=' + tagArray + '';
            } else {
                //= add active class
                $(this).addClass('active');
                //= push tag id to tag array
                tagArray.push(tagId);
                console.log('tagArray: ', tagArray);
                //= create url
                var url = 'http://localhost:8888/Test/TBG/wp-json/wp/v2/posts?tags=' + tagArray + '';
            }
            //= get element with post content
            var postContentElement = $( '.single .col-sm-9' );
            //= get json data from APU URI. 10 posts will be returned by default.
            if(tagArray.length > 0) {
                //= set loader to postContentElement before it gets data
                postContentElement.html( '<p>⌛️ Loading...</p>' );
                $.getJSON( '' + url + '', function( data ) {
                    console.log('url: ', url);
                	//= empty the postContentElement
                	postContentElement.empty();
                	//= loop through each post
                	console.log('data: ', data.length)
                	$.each( data, function( i, post ){
                		// console.log( post );
                		var link = post.link,                     //= get post link
                		    title = post.title.rendered,          //= get post title
                		    excerpt = post.excerpt.rendered,      //= get post excerpt
                		    content = post.content.rendered;      //= get post content

                        //= append data ftom each loop to postContentElement
                		postContentElement.append('<div><a href=' + link + ' target="_blank">&mdash; ' + title + '</a>' + excerpt + '</div>' );
                	});
                });
            } else {
                //= set no post element to postContentElement
                postContentElement.html( '<p>Nema postova za odabran filter</p>' );
            }
        });
        //================
        //== Flexslider
        $(window).on('load', function (e) {
            $('#pages-slider .flexslider, #slider-home .flexslider, #slider-category .flexslider').flexslider({
                animation: 'slide',
                controlNav: false,
                directionNav: true,
                smoothHeight: true
            });
            $('#carousel').flexslider({
                animation: "slide",
                controlNav: false,
                animationLoop: false,
                slideshow: false,
                itemWidth: 210,
                itemMargin: 5,
                smoothHeight: true,
                asNavFor: '#slider'
            });

            $('#slider').flexslider({
                animation: "slide",
                controlNav: false,
                animationLoop: false,
                slideshow: false,
                smoothHeight: true,
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
                // 'background-image': 'url("<?php echo get_template_directory_uri();?>/img/header/belgrade-4.jpg")'
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

        // $("[data-fancybox]").fancybox({
        //     // Options will go here
        // });

        $(".acf-map").on('click', function() {

            $.fancybox.open({
                src  : '#hidden-content-1',
                type : 'inline'
            });

        });

    });

    $ = jQuery.noConflict();


}(this, jQuery));
