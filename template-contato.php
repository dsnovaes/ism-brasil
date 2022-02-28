<script>
    var dataLayer = [];
    dataLayer.push({
    'contentGroup': 'Contact',
    'contentLevel': 'Single'
    });
</script>
<?php
/*
    Template Name: Contato
*/
get_header();
?>

<div class="greenGradient mx-auto titleBar mt-3 mb-4">
    <div class="container">
        <div class="row">
            <div class="col-11 col-md-12 mx-auto">
                <h1><?php echo the_title(); ?></h1>
            </div>
        </div>
    </div>
</div>

<div class="container mb-5" id="conteudo">
    <div class="row">
        <div class="col-11 col-md-7 mx-auto">
            <article>
                <?php the_content(); ?>
            </article>
        </div>
        <div class="col-11 col-md-4 mx-auto social">
            <h2>Siga-nos nas redes sociais</h2>
            <?php wp_nav_menu( array( 'theme_location' => 'social' ) ); ?>
        </div>
    </div>
</div>

<div class="unidades py-5">
    <div class="container">
        <div class="row">
            <div class="col-11 col-md-7 mx-auto">
                <h2>Nossos números e endereços</h2>
                <p>busca de unidades</p>
            </div>
            <div class="col-11 col-md-4 mx-auto">
                <h2>Veja também</h2>
                
            </div>
        </div>
    </div>
</div>

<?php
get_footer();
?>