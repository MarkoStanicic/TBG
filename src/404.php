<?php get_header(); ?>
	<!-- 404 section -->
		<section>
			<div id="post-404">
				<div class="img-center">
					<img src="<?php echo get_template_directory_uri();?>/img/torn-page.jpg" alt="">
				</div>
				<div class="container">
					<div class="wrap-text">
						<h1>
							UPS
						</h1>
						<h2>
							Trenutno nemamo stranu koju ste tražili
						</h2>
						<p>
							Možda pretragom stignete do željene strane
						</p>
						<div class="search">
							<form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
								<label>
								    <input type="search" class="search-field"
								        placeholder="<?php echo esc_attr_x( 'Pretraga …', 'placeholder' ) ?>"
								        value="<?php echo get_search_query() ?>" name="s"
								        title="<?php echo esc_attr_x( 'Pretraga:', 'label' ) ?>" />
								</label>
								<button type="submit" class="search-submit">
									<span class="fa fa-search"></span>
								</input>
							</form>
						</div>
						<h3 class="pY20">
							<i class="fa fa-home" aria-hidden="true"></i>
							<a href="<?php echo home_url(); ?>">Vratite se na našu početnu stranu!!!</a>
						</h3>
					</div>
				</div>
			</div>
			<div class="clearfix"></div>

		</section>
		<!-- /section -->
<?php get_footer(); ?>
