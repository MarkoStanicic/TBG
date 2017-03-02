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
		<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/bower_components/bootstrap/dist/css/bootstrap.css">
		<link href='http://fonts.googleapis.com/css?family=Roboto:400,900italic,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900&subset=latin,cyrillic-ext,greek-ext,greek,vietnamese,latin-ext,cyrillic' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>css/sass/style.css">

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

		<!-- wrapper -->
		<div class="">

			<!-- social links -->
			<div class="social">
				<div class="container">
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
			</div>


			<!-- header -->
			<header class="header clear" role="banner">
				<div class="img-wrapper">
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

							<ul class="search">
								<a href="javascript:void(0)">
									<span class="fa fa-search"></span>
								</a>
								<input class="search-input" type="search" name="s" aria-label="Search site for:" placeholder="<?php _e( 'To search, type and hit enter.', 'html5blank' ); ?>">
<!--								<button class="search-submit" type="submit">--><?php //_e( 'Search', 'html5blank' ); ?><!--</button>-->
							</ul>
						</div>
					</nav>
					<!-- /nav -->

			</header>
			<!-- /header -->
