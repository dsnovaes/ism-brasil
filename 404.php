<script>
    var dataLayer = [];
    dataLayer.push({
    'contentGroup': 'Error',
    'contentLevel': 'Error'
    });
</script>
<?php
get_header();
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-12 p-3 mt-3 title">
            <div class="col-11 col-md-10 mx-auto">
                <h1 class="text-center">Ops! Página não encontrada</h1>
                <p class="text-center">A página que você tentou acessar não foi encontrada. Veja se alguns dos nossos conteúdos abaixo lhe interessa:</p>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-11 col-md-6 col-lg-3 mx-auto pb-5 news">
                <p>Mapa do site</p>
                <?php wp_nav_menu( array( 'theme_location' => '404page' ) ); ?>
            </div>
            <div class="col-11 col-md-6 col-lg-3 mx-auto pb-5 news">
                <p>Conheça nossas marcas</p>
                <ul>
                    <?php
                        // A Consulta
                        query_posts( 'cat=2' );

                        // O Loop
                        while ( have_posts() ) : the_post();
                            echo '<li><a href="';
                            the_permalink();
                            echo '" data-link="404-links">';
                            the_title();
                            echo '</a></li>';
                        endwhile;

                        // Redefinindo Consulta
                        wp_reset_query();
                    ?>
                </ul>
            </div>
            <div class="col-11 col-md-6 col-lg-3 mx-auto pb-5 news">
                <p>Últimas Notícias</p>
                <ul>
                <?php
                    query_posts( 'cat=1&orderby=date&order=DESC&posts_per_page=4' );

                    while ( have_posts() ) : the_post();
                        echo '<li><a href="';
                        the_permalink();
                        echo '" data-link="404-links">';
                        the_title();
                        echo '</a></li>';
                    endwhile;
                    wp_reset_query();
                ?>
                </ul>
            </div>
            <div class="col-11 col-md-6 col-lg-3 pb-5">
                Outros
            </div>
        </div>
    </div>
</div>


            
<?php
get_footer();
?>