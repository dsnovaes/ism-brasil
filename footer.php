<div class="container text-center" id="relatorio">
<h5>Relatório de transparência e igualdade salarial de mulheres e homens</h5>
    <p>Conforme determinação do Ministério do Trabalho e Emprego (MTE), divulgamos o “Relatório de transparência salarial”, elaborado e disponibilizado pelo próprio MTE, que dispõe sobre a igualdade salarial e os critérios remuneratórios entre homens e mulheres.</p>
    <p><a href="https://grupoism.com.br/wp-content/uploads/2025/03/Relatório-Transparência-Salarial-ISM-2025.1.pdf">Relatório de Transparência Salarial 2025</a></p>
    <p><a href="https://grupoism.com.br/wp-content/uploads/2025/03/Relatório-Transparência-Salarial-SML-2025.1.pdf">Relatório de Transparência Salarial 2025</a></p>
    <p>Fonte: eSocial. Rais 2024 e Portal Emprega Brasil - Fevereiro de 2025</p>
</div>
<footer class="greenGradient">
	<div class="container">
			<div class="row pt-5 pb-4">
				<div class="col-11 col-md-6 col-lg-3 mx-auto">
					<div class="row mb-5 justify-content-between">
						<div class="col-6 col-md-10">
							<a href="<?php echo get_home_url(); ?>" data-link="footer-ism"><img src="<?php echo get_template_directory_uri() ?>/img/white-logo.svg" alt="ISM Brasil Logo" height="115" width="186" /></a>
						</div>
						<div class="col-6 col-md-10">
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

				<div class="col-11 col-md-6 col-lg-3 mx-auto mb-5">
					<p><?php bloginfo( $show = 'description' ) ?></p>
					<?php wp_nav_menu( array( 'theme_location' => 'footer' ) ); ?>
				</div>

				<div class="col-11 col-md-6 col-lg-3 mx-auto mb-5">
					<p>Siga-nos nas redes sociais</p>
					<div class="social">
						<?php wp_nav_menu( array( 'theme_location' => 'social' ) ); ?>
					</div>
					<p class="mt-4">Nossos números</p>
					<?php wp_nav_menu( array( 'theme_location' => 'phones' ) ); ?>
				</div>

				<div class="col-11 col-md-6 col-lg-3 mx-auto news">
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
				<div class="swiper-unidades">
					<div class="swiper-wrapper">
						<script> var listUnidades = [] </script>
						<?php
							query_posts( 'post_type=unidades&orderby=name&post_status=publish' );

							while ( have_posts() ) : the_post();
								$post_id = get_the_ID();
								$title = get_the_title();
								$url = get_field('unidade_local');
								$url_click = get_field('unidade_link');
								$address = get_field('unidade_enderco');
								$phone = get_field('unidade_telefone');
								echo '<div class="swiper-slide"><h4>' . $title . '</h4>';
								echo '<address><a href="' . $url_click . '" target="_blank" data-link="footer-address" rel="nofollow noopener">' . $address . '</a></address><p>' . $phone . '</p></div>';
								echo '<script>listUnidades.push({"unidadeID": ' . $post_id . ', "unidadeTitle":"' . $title . '", "unidadeAddress":"' . $address . '", "unidadePhone":"' . $phone . '", "unidadeURL":"' . $url . '", });</script>';
							endwhile;
							wp_reset_query();
							?>
					</div>
					<div class="swiper-button-prev"></div>
					<div class="swiper-button-next"></div>
				</div>
			</div>
		</div>

<script>
var swiper = new Swiper('.swiper-unidades', {
	breakpoints: {
	// when window width is >= 320px
	320: {
		slidesPerView: 1,
		spaceBetween: 30
	},
	// when window width is >= 480px
	480: {
		slidesPerView: 1,
		spaceBetween: 30
	},
	// when window width is >= 640px
	640: {
		slidesPerView: 3,
		spaceBetween: 90
	}
	},
	loop: true,
	loopFillGroupWithBlank: true,
	navigation: {
		nextEl: ".swiper-button-next",
		prevEl: ".swiper-button-prev",
	}
});
swiper.on('slideChange', function () {
    dataLayer.push({
    'event': 'swipe',
    'swiper': 'swiper-unidades'
    });
});
</script>		

		<div class="footnotes">	
			<div class="row justify-content-between align-items-center">
				<div class="col-6 col-md-4">
					<?php bloginfo( $show = 'description' ) ?>  - CNPJ <a href="https://infocnpj.com/10516704000175-bebidas-sao-miguel" class="cnpj">10.516.704/0001-75</a>
				</div>
				<div class="col-5 col-md-4 text-center">
					<a class="top" data-link="footer-top">Ir para o topo</a>
				</div>
				<div class="col-1 col-md-4 text-end">
					<a href="https://www.diegonovaes.com.br" data-link="footer-dev" rel="nofollow noopener"><img src="<?php echo get_template_directory_uri() ?>/img/diego-novaes.svg" alt="Developer Diego Novaes" height="20" width="20" /></a>
				</div>
			</div>
		</div>
	</div>
</footer>
<div class="veryLastBar orangeGradient">
</div>
<?php
if ($args[0] == "glow") { ?>
<div class="confirmAge">
	<div class="whiteBox">
		<h4>Você tem 18 anos ou mais?</h4>
		<button data-action="yes" class="btn btn-success">Sim</button> <button data-action="no" class="btn btn-danger">Não</button>
	</div>
</div>

<script>
	const modalAge = document.querySelector(".confirmAge");
	document.querySelector("button[data-action=yes]").addEventListener("click",(e)=>{
		e.preventDefault()
		confirmIsAdult()
	});
	document.querySelector("button[data-action=no]").addEventListener("click",(e)=>{
		e.preventDefault()
		window.location.href = "https://grupoism.com.br/consumo-responsavel";
	});
	
	const myCookie = document.cookie;
	let expires = new Date();
	expires.setTime(expires.getTime() + (24 * 60 * 60 * 1000)); 


	if (myCookie.split("; ").indexOf("isAdult=true") === -1) {
		modalAge.setAttribute("style","display:flex;")
	}

	function confirmIsAdult() {
		document.cookie = 'isAdult=true; expires=' + expires.toUTCString() + '; path=/';
		modalAge.removeAttribute("style")
		modalAge.setAttribute("style","display:none")
	}
</script>
<?php }; ?>
<script>
	const btnTop = document.querySelector("footer .footnotes a.top")
	const theTop = document.querySelector("body")
	btnTop.addEventListener("click", (e) => {
		e.preventDefault()
		theTop.scrollIntoView()
	})
</script>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
</body>
</html>