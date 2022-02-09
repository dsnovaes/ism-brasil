<script>
    var dataLayer = [];
    dataLayer.push({
    'contentGroup': 'News',
    'contentLevel': 'Single'
    });
</script>
<?php
get_header();
?>

<script>
function copy(element) {
        jQuery(function ($) {
            var $temp = $("<input>");
            $("body").append($temp);
            $temp.val($(element).text()).select();
            document.execCommand("copy");
            $temp.remove();
            alert("Link da notícia copiado");
        });
}
</script>
<div class="container">
    <div class="row mt-3 noticia pt-5">
        <div class="col-1 d-none d-lg-block mb-5 share">
            <ul class="sticky-top">
                <li><a href="https://www.facebook.com/sharer/sharer.php?title=Veja essa notícia!&text=Veja essa notícia: <?php the_title(); ?> Confira mais notícias do Grupo ISM <?php echo get_permalink(); ?>&description=Veja essa notícia!&u=<?php echo get_permalink(); ?>" class="fb rounded-top" data-link="share" title="Compartilhar no Facebook" rel="nofollow noopener"><i class="fab fa-facebook-f"></i></a></li>
                <li><a href="https://twitter.com/intent/tweet?text=&title= &description= &status=Veja essa notícia: <?php the_title(); ?>? Acesse o endereço para descobrir 👉 <?php echo get_permalink(); ?>" class="tw" rel="nofollow noopener"><i class="fab fa-twitter" title="Compartilhar no Twitter" data-link="share"></i></a></li>
                <li><a href="https://api.whatsapp.com/send?phone=&text= 😁 Veja essa notícia: <?php the_title(); ?>? Acesse o endereço para descobrir 👉 <?php echo get_permalink(); ?>" class="wapp" title="Compartilhar no WhatsApp" rel="nofollow noopener"><i class="fab fa-whatsapp" data-link="share"></i></a></li>
                <li><a href="javascript:copy('#link')" class="url rounded-bottom" data-link="share" title="Copiar link da notícia" rel="nofollow noopener"><i class="fas fa-link"></i></a><span class="d-none" id="link"><?php echo get_permalink(); ?></span></li>
            </ul>
        </div>

        <div class="col-11 col-md-7 mx-auto">
            <article id="conteudo" class="mb-4">
                <h1><?php echo the_title(); ?></h1>

                <?php 

                $resumo = get_the_excerpt(); 
                if ( has_excerpt() ) {
                    echo "<h2 class='subtitulo mt-3'>" . $resumo . "</h2>";
                }
                ?> 
                <div class="share">
                    <ul class="sticky-top">
                        <li><a href="https://www.facebook.com/sharer/sharer.php?title=Veja essa notícia!&text=Veja essa notícia: <?php the_title(); ?> Confira mais notícias do Grupo ISM <?php echo get_permalink(); ?>&description=Veja essa notícia!&u=<?php echo get_permalink(); ?>" class="fb rounded-top" data-link="share" title="Compartilhar no Facebook" rel="nofollow noopener"><i class="fab fa-facebook-f"></i></a></li>
                        <li><a href="https://twitter.com/intent/tweet?text=&title= &description= &status=Veja essa notícia: <?php the_title(); ?>? Acesse o endereço para descobrir 👉 <?php echo get_permalink(); ?>" class="tw" rel="nofollow noopener"><i class="fab fa-twitter" title="Compartilhar no Twitter" data-link="share"></i></a></li>
                        <li><a href="https://api.whatsapp.com/send?phone=&text= 😁 Veja essa notícia: <?php the_title(); ?>? Acesse o endereço para descobrir 👉 <?php echo get_permalink(); ?>" class="wapp" title="Compartilhar no WhatsApp" rel="nofollow noopener"><i class="fab fa-whatsapp" data-link="share"></i></a></li>
                        <li><a href="javascript:copy('#link')" class="url rounded-bottom" data-link="share" title="Copiar link da notícia" rel="nofollow noopener"><i class="fas fa-link"></i></a><span class="d-none" id="link"><?php echo get_permalink(); ?></span></li>
                    </ul>
                    <p class="post-info">Postado em <?php the_date(); ?></p>
                </div>
                <figure class="my-3">
                    <?php the_post_thumbnail( array( 750 ) ); ?>
                    <figcaption><?php the_post_thumbnail_caption(); ?></figcaption>
                </figure>
                <?php the_content(); ?>
            </article>
        </div>

        <div class="col-11 col-md-4 mx-auto sidebar">
            <div class="sticky-top">
                <?php 
                    function verifica() {
                    $marca = get_field('marca');
                        if ($marca == "Não") { 
                            echo "<h3>Veja também</h3>";

                    $exclude = get_the_ID();

                    $related = new WP_Query(
                        array(
                            'post_type'   => 'noticias',
                            'posts_per_page' => 2,
                            'post__not_in'   => array( $exclude )
                        )
                    );

                    if( $related->have_posts() ) { 
                        while( $related->have_posts() ) { 
                            $related->the_post(); ?>
                <a href="<?php the_permalink(); ?>" class="h2 p-4 mb-2 rounded vejaTambem" data-link="related-news">
                    <h4><?php the_title(); ?></h4>
                </a><?php
                        }
                        wp_reset_postdata();
                    }
                     } 
                        else { 

                    $id = get_field('qual_marca');
                            ?>


                <h3>Conheça</h3>
                <style type="text/css">
                    .hover-marca:hover {
                        background-color: <?php the_field('cor_da_marca', $id) ?>;
                        color: <?php the_field('cor_secundaria', $id) ?>;
                        border-color: <?php the_field('cor_da_marca', $post_id) ?>;
                    }
                    .hover-marca:hover h2 a {
                        color: <?php the_field('cor_secundaria', $id) ?> !important;
                    }
                    .hover-marca:hover p {
                        color: <?php the_field('cor_secundaria', $id) ?> !important;
                        opacity: 0.5;
                    }
                </style>
                <div class="p-5 m-2 rounded marca hover-marca">
                    <h2><a href="<?php echo get_permalink($id); ?>" data-link="related-brands"><?php echo get_the_title($id); ?></a></h2>
                    <p><?php echo get_the_excerpt($id); ?></p>
                </div>

                        <?php }
                    }
                    verifica();
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