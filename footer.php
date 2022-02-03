<footer class="greenGradient">
	<div class="container">
			<div class="row pt-5 pb-4">
				<div class="col-10 col-md-6 col-lg-3 mx-auto">
					<div class="row mb-5 justify-content-between">
						<div class="col-6 col-md-10">
							<a href="<?php echo get_home_url(); ?>" data-link="footer-ism"><img src="<?php echo get_template_directory_uri() ?>/img/white-logo.svg" alt="ISM Brasil Logo" height="115" width="186" /></a>
						</div>
						<div class="col-5 col-md-10">
							<ul class="row mt-4">
							<?php
							// A Consulta
							query_posts( 'post_type=marcas' );

							// O Loop
							while ( have_posts() ) : the_post();
							    echo '<li class="col-5"><a href="';
							    the_permalink();
							    echo '" data-link="footer-brands">';
							    the_title();
							    echo '</a></li>';
							endwhile;

							// Redefinindo Consulta
							wp_reset_query();
							?>
							</ul>
						</div>
					</div>
				</div>

				<div class="col-10 col-md-6 col-lg-3 mx-auto mb-5">
					<p><?php bloginfo( $show = 'description' ) ?></p>
					<?php wp_nav_menu( array( 'theme_location' => 'footer' ) ); ?>
				</div>

				<div class="col-10 col-md-6 col-lg-3 mx-auto social mb-5">
					<p>Siga-nos nas redes sociais</p>
					<?php wp_nav_menu( array( 'theme_location' => 'social' ) ); ?>
				</div>

				<div class="col-10 col-md-6 col-lg-3 mx-auto news">
					<p>Últimas Notícias</p>
					<ul>
						<?php
						query_posts( 'post_type=noticias&orderby=date&order=DESC&posts_per_page=2' );

						while ( have_posts() ) : the_post();
						    echo '<li><a href="';
						    the_permalink();
						    echo '" data-link="footer-news">';
						    the_title();
						    echo '</a></li>';
						endwhile;
						wp_reset_query();
						?>
					</ul>
					<p class="text-end"><a href="<?php echo get_post_type_archive_link('noticias') ?>" data-link="footer-news">Veja mais notícias</a></p>
				</div>
		</div>

		<div class="addresses">
			<div class="row">
				<div class="col-10 col-md-6 col-lg-3">
					unidade 1
				</div>
				<div class="col-10 col-md-6 col-lg-3">
					unidade 2
				</div>
				<div class="col-10 col-md-6 col-lg-3">
					unidade 3
				</div>
				<div class="col-10 col-md-6 col-lg-3">
					unidade 4
				</div>
			</div>
		</div>
		<div class="footnotes">	
			<div class="row">
				<div class="col-6 col-md-4">
					<?php bloginfo( $show = 'description' ) ?>  - CNPJ 01.123.456/0001-78
				</div>
				<div class="col-5 col-md-4 text-center">
					<a href="#top" class="top" data-link="footer-top">Ir para o topo</a>
				</div>
				<div class="col-1 col-md-4 text-end">
					<a href="https://www.diegonovaes.com" data-link="footer-dev"><img src="<?php echo get_template_directory_uri() ?>/img/diego-novaes.svg" alt="Logo of the designer Diego Novaes" height="20" width="20" /></a>
				</div>
			</div>
		</div>
	</div>
</footer>
<div class="veryLastBar orangeGradient">
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</body>
</html>