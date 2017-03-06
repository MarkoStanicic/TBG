<?php get_header(); ?>

	<main role="main" aria-label="Content">
		<!-- section -->
		<section>

			<!-- article -->
			<article id="post-404">
				<div class="container">
					<h1 class="pY40">
						UPSS
					</h1>
					<h2>
						Trenutno nemamo stranu koju ste tražili
					</h2>
					<p>
						Možda pretragom stignete do željene strane
					</p>
					<ul class="search">
						<input class="search-input" type="search" name="s" aria-label="Search site for:" placeholder="<?php _e( 'Pretraga', 'html5blank' ); ?>">
						<a href="javascript:void(0)">
							<span class="fa fa-search"></span>
						</a>
						<!--								<button class="search-submit" type="submit">--><?php //_e( 'Search', 'html5blank' ); ?><!--</button>-->
					</ul>
					<h3 class="pY40">
						<i class="fa fa-home" aria-hidden="true"></i>
						<a href="<?php echo home_url(); ?>">Vratite se na našu početnu stranu!!!</a>
					</h3>
				</div>

			</article>
			<!-- /article -->

		</section>
		<!-- /section -->
	</main>

<?php get_footer(); ?>
