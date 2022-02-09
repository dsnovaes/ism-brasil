<script>
    var dataLayer = [];
    dataLayer.push({
    'contentGroup': 'Brands',
    'contentLevel': 'Single'
    });
</script>
<?php
/*
    Template Name: Marca
    Template Post Type: post
*/
get_header();
?>
<div class="container">
    <div class="row">
        <div class="col-12 greenGradient mb-5 mt-3 title" style="background: <?php the_field('cor_da_marca') ?>; color: <?php the_field('cor_secundaria') ?>;">
            <div class="col-11 col-md-10 mx-auto">
                <div class="row align-items-center">
                    <div class="col-6">
                        <h1><?php echo the_title(); ?></h1>
                    </div>
                    <div class="col-6 text-end">
                        <p class="m-0"><a href="<?php echo get_post_type_archive_link('marcas') ?>" style="color: <?php the_field('cor_secundaria') ?> !important;" data-link="brands">Conhecer outras marcas</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container marcas" id="conteudo">
    <div class="col-md-10 col-11 mx-auto">
        <div class="row">
            <div class="col-11 col-md-6 col-lg-5 col-xl-4 mb-3 mx-auto">
                <article>
                    <?php the_content(); ?>                
                </article>
            </div>
            <div class="col-11 col-md-6 col-lg-7 col-xl-8 mx-auto">
                <?php the_post_thumbnail( array( 730 ) ); ?>
            </div>
        </div>
        <?php 
        $flavors = get_field('variacoes');
        if( !empty( $flavors ) ): ?>
        <div class="row mt-5">
            <div class="col-11 col-md-8 mx-auto">
                <h2>Sabores e Variações</h2>
                <div class="row variacoes">
                    <div class="col-11">
                        <?php echo $flavors; ?>
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>

        <!--
                    <div class="col-11 col-md-3">
                        foto
                    </div>
                    <div class="col-11 col-md-9">
                        <h3>Sabor Limão</h3>
                        <p>Drink-T é o chá preto com frutas que possui baixo teor de açúcar, podendo ser também encontrado no sabor limão que é rico em vitamina C que fortalece o sistema imunológico. Chá preto e limão é a combinação perfeita pois possuem antioxidantes que evitam doenças cardíacas e neurodegenerativas. As propriedades estimulante e diuréticas ajudam a aumentar o metabolismo e eliminar as toxinas. Além de saboroso, Drink-T ajuda a cuidar da saúde e impede o ganho de peso.</p>
                        <p><a href="#" data-link="brands-details">Informações nutricionais</a></p>
                    </div>
                </div>
                <div class="row variacoes mt-3">
                    <div class="col-11 col-md-3">
                        foto
                    </div>
                    <div class="col-11 col-md-9">
                        <h3>Sabor Pêssego</h3>
                        <p>Um chazinho preto bem gelado já é tudo, ainda mais somado ao pêssego que é uma fruta saborosa muito consumida e que contém especiais propriedades que auxiliam em tratamentos de beleza, além de uma excelente fonte das vitaminas A, B e C, além de alto teor de potássio, sódio, fósforo e carotenoides. Juntando todos os benefícios, Drink-T uniu essas duas potências para oferecer mais sabor e vitalidade aos nossos consumidores.</p>
                        <p><a href="#" data-link="brands-details">Informações nutricionais</a></p>
                    </div>-->



<!-- TESTE NOTICIAS RELACIONADAS A MARCA -->


        <?php 
        $post_id = get_the_ID();

        $related = new WP_Query(
                        array(
                            'category__in'   => 1,
                            'posts_per_page' => 3,
                            'orderby' => 'date'
                        )
                    );

        if( $related->have_posts() ) { 
            ?>

        <div class="row mt-5">
            <div class="col-11 col-md-8 mx-auto">
                <h2>Notícias sobre <?php the_title(); ?></h2>
                <div class="row">
                    <div class="col-11">


            <?php
                        while( $related->have_posts() ) { 
                            $related->the_post(); $related_post = get_the_ID(); ?>
oi
        <?php
            }
            wp_reset_postdata();
        } ?>
                    </div>
                </div>
            </div>
        </div>

<!-- TESTE NOTICIAS RELACIONADAS A MARCA -->

    </div>
</div>

<div class="container">
    <div class="col-10 mx-auto mt-5">
        <h2>Veja também</h2>
        <div class="row">
            <?php
            $post_id = get_the_ID();

                    $related = new WP_Query(
                        array(
                            'post_type'   => 'marcas',
                            'posts_per_page' => 2,
                            'orderby' => 'rand',
                            'post__not_in'   => array( $post_id )
                        )
                    );

                    if( $related->have_posts() ) { 
                        while( $related->have_posts() ) { 
                            $related->the_post(); $related_post = get_the_ID(); ?>
            <div class="col-12 col-md-6 mx-auto">
                <style type="text/css">
                        .hover-<?php echo $related_post; ?>-marca:hover {
                            background-color: <?php the_field('cor_da_marca', $related_post) ?>;
                            color: <?php the_field('cor_secundaria', $related_post) ?>;
                            border-color: <?php the_field('cor_da_marca', $related_post) ?>;
                        }
                        .hover-<?php echo $related_post; ?>-marca:hover h2 a {
                            color: <?php the_field('cor_secundaria', $related_post) ?> !important;
                        }
                        .hover-<?php echo $related_post; ?>-marca:hover p {
                            color: <?php the_field('cor_secundaria', $related_post) ?> !important;
                            opacity: 0.5;
                        }
                    </style>
                <div class="mb-4 rounded marca p-5 hover-<?php echo $related_post; ?>-marca">
                    <div class="row align-items-center">
                        <div class="col-7">
                            <h2><a href="<?php the_permalink(); ?>" data-link="brands-title"><?php the_title(); ?></a></h2>
                            <p><?php the_excerpt(); ?></p>
                            <p><a href="<?php the_permalink(); ?>" class="greenGradient" rel="nofollow" data-link="brands-knowmore">Saiba mais</a></p>
                        </div>
                        <div class="col-4">
                            <?php 
                            $image = get_field('packshot');
                            $size = 'thumbnail';
                            if( !empty( $image ) ): ?>
                                <a href="<?php the_permalink(); ?>" data-link="brands-packshot"><img src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr($image['alt']); ?>" /></a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div><?php
                        }
                        wp_reset_postdata();
                    } ?>
        </div>
    </div>
</div>
            
<?php
get_footer();
?>