(function( root, $, undefined ) {
	'use strict';

	$(function () {

		//== Flexslider
		$(window).load(function() {
		    $('.flexslider').flexslider({
		    	animation: 'slide',
        		controlNav: false,
        		directionNav: true
		    });
		});

		//== Sticky Sidebar
		var getSticky = $('.sticky');
		if (getSticky.length) {
			var stickyOffsetTop = getSticky.offset().top,
				stickyOffsetLeft = getSticky.offset().left,
				stickyWidth = getSticky.width();
			$(window).scroll(function() {
	    		if($(window).scrollTop() > stickyOffsetTop){
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
	        			'position':'static',
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
		$('.sidebar .sectionTitle a, .footerWidget .sectionTitle a').click(function() {
	      	var id =  $(this).attr('id');
	      	id = id.split('_');
	      	$('.sidebar .sectionTitle a, .footerWidget .sectionTitle a').removeClass('active');
	      	$(this).addClass('active');
	      	$('.sidebar .toggle, .footerWidget .toggle').addClass('hide');
	      	$('.sidebar .toggle#, .footerWidget .toggle#' + id[1]).removeClass('hide');
	   	});

		$("[data-fancybox]").fancybox({
			// Options will go here
            beforeShow : function(){
                this.title =  this.data + " <a  target='_blank' href='https://www.instagram.com/thebelgradeguide/'><span class='fa fa-instagram'></span></a> " + $(this.element).data("caption");
            }

		});

    });


} ( this, jQuery ));


(function($) {
    $doc = $(document);

    $doc.ready( function() {

        /**
         * Retrieve posts
         */
        function get_posts($params) {

            $container = $('#container-async');
            $content   = $container.find('.content');
            $status    = $container.find('.status');

            $status.text('Loading posts ...');

            $.ajax({
                url: bobz.ajax_url,
                data: {
                    action: 'do_filter_posts',
                    nonce: bobz.nonce,
                    params: $params
                },
                type: 'post',
                dataType: 'json',
                success: function(data, textStatus, XMLHttpRequest) {

                    if (data.status === 200) {
                        $content.html(data.content);
                    }
                    else if (data.status === 201) {
                        $content.html(data.message);
                    }
                    else {
                        $status.html(data.message);
                    }
                },
                error: function(MLHttpRequest, textStatus, errorThrown) {

                    $status.html(textStatus);

                    /*console.log(MLHttpRequest);
                     console.log(textStatus);
                     console.log(errorThrown);*/
                },
                complete: function(data, textStatus) {

                    msg = textStatus;

                    if (textStatus === 'success') {
                        msg = data.responseJSON.found;
                    }

                    $status.text('Posts found: ' + msg);

                    /*console.log(data);
                     console.log(textStatus);*/
                }
            });
        }

        /**
         * Bind get_posts to tag cloud and navigation
         */
        $('#container-async').on('click', 'a[data-filter], .pagination a', function(event) {
            if(event.preventDefault) { event.preventDefault(); }

            $this = $(this);

            /**
             * Set filter active
             */
            if ($this.data('filter')) {
                $this.closest('ul').find('.active').removeClass('active');
                $this.parent('li').addClass('active');
                $page = $this.data('page');
            }
            else {
                /**
                 * Pagination
                 */
                $page = parseInt($this.attr('href').replace(/\D/g,''));
                $this = $('.nav-filter .active a');
            }


            $params    = {
                'page' : $page,
                'tax'  : $this.data('filter'),
                'term' : $this.data('term'),
                'qty'  : $this.closest('#container-async').data('paged'),
            };

            // Run query
            get_posts($params);
        });

        $('a[data-term="all-terms"]').trigger('click');
    });

})(jQuery);