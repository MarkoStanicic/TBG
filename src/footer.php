<!-- footer -->
<footer>


	<!-- copyright -->
	<!--<p class="copyright">
		&copy; <?php /*echo date('Y'); */?> Copyright <?php /*bloginfo('name'); */?>. <?php /*_e('Powered by', 'html5blank'); */?>
		<a href="//wordpress.org">WordPress</a> &amp; <a href="//html5blank.com">HTML5 Blank</a>.
	</p>-->
	<!-- /copyright -->
	<?php
	// Get Foot content
	get_template_part('content-footer');
	?>

</footer>
<!-- /footer -->

</div>
<!-- /wrapper -->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDozQQ2CHJO9A-6fvun45yDHLm0wRsyZ0o"></script>
	<script src="<?php echo get_template_directory_uri(); ?>/js/lib/google-maps.js"></script>
	<script src="<?php echo get_template_directory_uri(); ?>/js/lib/jquery.flexslider-min.js"></script>
	<script src="<?php echo get_template_directory_uri(); ?>/js/lib/jquery.fancybox.min.js"></script>
	<?php wp_footer(); ?>

	<!-- analytics -->
	<script>
	(function(f,i,r,e,s,h,l){i['GoogleAnalyticsObject']=s;f[s]=f[s]||function(){
			(f[s].q=f[s].q||[]).push(arguments)},f[s].l=1*new Date();h=i.createElement(r),
		l=i.getElementsByTagName(r)[0];h.async=1;h.src=e;l.parentNode.insertBefore(h,l)
		})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
		ga('create', 'UA-XXXXXXXX-XX', 'yourdomain.com');
		ga('send', 'pageview');
		</script>


</body>
