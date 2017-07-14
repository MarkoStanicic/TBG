<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' : '; } ?><?php bloginfo('name'); ?></title>

		<link href="//www.google-analytics.com" rel="dns-prefetch">
		<link href="<?php echo get_template_directory_uri(); ?>/img/icons/hram.ico" rel="shortcut icon">
		<link href="<?php echo get_template_directory_uri(); ?>/img/icons/touch.png" rel="apple-touch-icon-precomposed">
		<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?>" href="<?php bloginfo('rss2_url'); ?>" />
		<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/bower_components/font-awesome/css/font-awesome.css">
		<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/flexslider.css">
		<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/jquery.fancybox.min.css">
		<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/bower_components/bootstrap/dist/css/bootstrap.css">
        <?php /*<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/style.css">*/?>

		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="<?php bloginfo('description'); ?>">

		<script type="text/javascript">
			var templateUrl = '<?= get_bloginfo("template_url"); ?>';
		</script>

		<?php wp_head(); ?>
		<script>
        // conditionizr.com
        // configure environment tests
        conditionizr.config({
            assets: '<?php echo get_template_directory_uri(); ?>',
            tests: {}
        });
        </script>

	</head>
	<body <?php body_class(); ?>>

<!--    FB like button-->
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.9";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>
<!--    END FB like button-->

		<!-- wrapper -->
		<div class="">

			<!-- social links -->
			<div class="social">
				<ul>
					<li>
						<a href="kontakt">
							Kontakt
						</a>
					</li>
				</ul>
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
			</div><!-- . / endsocial links -->


			<!-- header -->
			<header class="header clear" role="banner">
				<div class="img-wrapper">
					<img src="<?php echo get_template_directory_uri();?>/img/header/belgrade-1.jpg"alt="">
				</div>
					<!-- logo -->
<!--					<div class="logo">-->
<!--						<a href="--><?php //echo home_url(); ?><!--">-->
<!--							<!-- svg logo - toddmotto.com/mastering-svg-use-for-a-retina-web-fallbacks-with-png-script -->
<!--							<img src="--><?php //echo get_template_directory_uri(); ?><!--/img/logo.svg" alt="Logo" class="logo-img">-->
<!--						</a>-->
<!--					</div>-->
					<!-- /logo -->

					<!-- nav -->
					<nav class="nav" role="navigation">
						<div class="container">

							<?php html5blank_nav(); ?>

<!--							<ul class="search">-->
<!--								<a href="javascript:void(0)">-->
<!--									<span class="fa fa-search"></span>-->
<!--								</a>-->
<!--								<input class="search-input" type="search" name="s" aria-label="Search site for:" placeholder="--><?php //_e( 'Pretraga', 'html5blank' ); ?><!--">-->
<!--								<button class="search-submit" type="submit">--><?php //_e( 'Search', 'html5blank' ); ?><!--</button>-->
<!--							</ul>-->
						</div>
					</nav>
					<!-- /nav -->

			</header>
			<!-- /header -->
