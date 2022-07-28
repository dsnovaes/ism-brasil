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
    <div class="row justify-content-between">
        <div class="col-11 col-md-7 mx-auto mb-5">
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
            <div class="col-11 col-md-7 mx-auto mb-5">
                <h2>Nossos números e endereços</h2>
                <p>Selecione uma unidade e veja os seus detalhes</p>
                <!--  onChange="dataLayer.push({'event': 'unitChoose', 'unit': 'inserir aqui o nome da unidade'});" -->
                <select id="unidades">
                    <option>Selecione</option>
                    <?php
                        query_posts( 'post_type=unidades&orderby=name&post_status=publish' );

                        while ( have_posts() ) : the_post();
                            $post_id = get_the_ID();
                            echo '<option value="' . $post_id . '">';
                            the_title();
                            echo '</option>';
                        endwhile;
                        wp_reset_query();
                    ?>
                </select>
                <div class="row">
                    <div class="col-12 col-lg-5 mb-5">
                        <h3>Fábrica Alagoinhas</h3>
                        <address>Rodovia BR-101, Km 112 - S/N, Cercado. Alagoinhas - BA</address>
                        <!--<a href="tel:07134567890" data-link="contacts-phone">(71) 3456-7890</a>-->
                    </div>
                    <div class="col-12 col-lg-7">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3900.190214345317!2d-38.42713948508888!3d-12.167449591386971!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x716bd94671beebd%3A0xdc3a0c6fbced9e42!2sIndustria%20de%20Bebidas%20Sao%20Miguel%20Ltda!5e0!3m2!1spt-BR!2sbr!4v1646099361508!5m2!1spt-BR!2sbr" width="100%" height="300" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                </div>

<script>
    var unidadeTitulo = document.querySelector('.unidades h3');
    var unidadeEndereco = document.querySelector('.unidades address');
    var unidadeTelefone = document.querySelector('.unidades a');
    var unidadeLocal = document.querySelector('.unidades iframe');
    const selectUnidades = document.getElementById('unidades');

    selectUnidades.addEventListener('change', (event) => {
        var selectedUnidade = document.querySelectorAll('option:checked')[0].attributes[0].value; // pega o valor do atributo do option selecionado
        
        const chosenUnidade = listUnidades.find( uni => uni.unidadeID == selectedUnidade );

        unidadeTitulo.innerHTML = chosenUnidade.unidadeTitle;
        unidadeEndereco.innerHTML = chosenUnidade.unidadeAddress;
        // unidadeTelefone.innerHTML = chosenUnidade.unidadePhone;
        // unidadeTelefone.attributes[0].value = "tel:0" + chosenUnidade.unidadePhone.replace("-","").replace("(","").replace(")","").replace(" ","");
        unidadeLocal.attributes[0].value = chosenUnidade.unidadeURL + "&output=embed";
        
        
    });

</script>
                
            </div>
            <div class="col-11 col-md-4 mx-auto">
                <?php    
                    if( have_rows('contacts_links') ):
                ?>
                <h2>Veja também</h2>
                <ul>
                <?php
                    while( have_rows('contacts_links') ) : the_row();                            
                    $title = get_sub_field('link_title');
                    $url = get_sub_field('link_url');
                ?>
                <li><a href="<?= $url ?>" rel="nofollow noopener" data-link="contacts-links"><?= $title ?></a></p>
                <?php
                    endwhile;
                ?>
                </ul>
                <?php
                endif;
                ?>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
    integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
    crossorigin="anonymous"></script>
<?php
get_footer();
?>