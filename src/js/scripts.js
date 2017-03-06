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
				'background-image': 'url(http://localhost/tbg/wp-content/themes/TBG/src/img/header/belgrade-1.jpg)'
			});
		} else {
			imgWrapper.css({
				'background-image': 'url(http://localhost/tbg/wp-content/themes/TBG/src/img/header/belgrade-4.jpg)'
			});
		}

		// = Toggle Search Field
		$('.search a').on('click', function () {
			$('.search-input').fadeToggle(300);
		});

		//== Sidebar Toggle Sections
		$('.sidebar .sectionTitle a').click(function() {
	      	var id =  $(this).attr('id');
	      	id = id.split('_');
	      	$('.sidebar .sectionTitle a').removeClass('active');
	      	$(this).addClass('active');
	      	$('.sidebar .toggle').addClass('hide'); 
	      	$('.sidebar .toggle#' + id[1]).removeClass('hide');
	   	});


	});

} ( this, jQuery ));