(function (root, $, undefined) {
    'use strict';

    $(function () {

        // $.getJSON("http://localhost:8888/Test/TBG/wp-json/wp/v2/posts?tags=95&filter[orderby]=data&_embed&callback=", function(a) {
        //     $("body").append(a[0].content + "<p>&mdash; " + a[0].title + "</p>")
        // });

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
                var url = 'http://localhost:8888/Test/TBG/wp-json/wp/v2/posts?tags=' + tagArray + '&filter[orderby]=data&_embed';
            } else {
                //= add active class
                $(this).addClass('active');
                //= push tag id to tag array
                tagArray.push(tagId);
                console.log('tagArray: ', tagArray);
                //= create url
                var url = 'http://localhost:8888/Test/TBG/wp-json/wp/v2/posts?tags=' + tagArray + '&filter[orderby]=data&_embed';
            }
            //= get element with post content && get element with tag content
            var currentContent = $('#currentContent'),
                filterTagContent = $('#filterTagContent');
            //= get json data from API URI. 10 posts will be returned by default.
            if(tagArray.length > 0) {
                //= set loader to postContentElement before it gets data
                currentContent.hide();
                filterTagContent.show().html( '<p>⌛️ Loading...</p>' );

                $.getJSON( '' + url + '', function( data ) {
                    console.log('data: ', data);
                	//= empty the postContentElement
                	filterTagContent.empty();
                	//= loop through each post
                	console.log('DATA: ', data.length)
                	$.each( data, function( i, post ) {
                		console.log( post );
                		var link = post.link,                     //= get post link
                		    title = post.title.rendered,          //= get post title
                		    excerpt = post.excerpt.rendered,      //= get post excerpt
                            content = post.content.rendered,      //= get post content
                            authorNum = post.author,
                		    authorSLug = post._embedded.author[0].slug,   //= get post content
                            date = post.date,
                            imageUrl = post.better_featured_image.source_url;

                        //= author slug
                        //= define date
                        var d = new Date(date);
                        var curr_date = d.getDate();
                        var curr_month = d.getMonth();
                        var curr_year = d.getFullYear();
                        var monthNames = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
                        var postDate = monthNames[curr_month] + ' ' + curr_date + ", " + curr_year + '.';
                        //= append data ftom each loop to postContentElement

                        var temp = '';
                            temp += '<article>';
                                temp += '<div class="col-sm-12">';
                                    temp += '<div class="row">';
                                        temp += '<div class="col-sm-4">';
                                            temp += '<a class="img" href="' + link + '">';
                                                temp += '<img src="' + imageUrl + '" />'
                                            temp += '</a>';
                                        temp += '</div>';
                                        temp += '<div class="col-sm-8">';
                                            temp += '<ul class="post-data">';
                                                temp += '<li>';
                                                    temp += '<span>By ' + authorSLug + '</span>';
                                                    temp += '<span><i class="fa fa-clock-o"></i>' + postDate + '</span>';
                                                temp += '</li>';
                                            temp += '</ul>';
                                            temp += '<h3 class="title">';
                                                temp += '<a href=href="' + link + '">';
                                                    temp += title;
                                                temp += '</a>';
                                            temp += '</h3>';
                                            temp += '<div class="category-content">';
                                                temp += '<p class="clearfix">';
                                                    temp += excerpt;
                                                temp += '</p>';
                                                temp += '<a class="readmore" href="' + link + '">Pročitajte više</a>';
                                            temp += '</div>';
                                        temp += '</div>';
                                    temp += '</div>';
                                    temp += '<div class="borderLine"></div>';
                                temp += '</div>';
                            temp += '</article>';

                        //= append template with response
                		filterTagContent.append(temp);
                	});
                });
            } else {
                //= set no post element to postContentElement
                filterTagContent.html('');
                currentContent.show();
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
