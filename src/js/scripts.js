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
					    'width': stickyWidth,
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
		});

	});

} ( this, jQuery ));