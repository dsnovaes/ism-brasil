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

<!-- from agua loa

          <figure class="my-3 text-center">
            <div class="featured">
            <?php the_post_thumbnail( array( 750 ) ); ?>
              <figcaption class="credits"><?php echo get_post(get_post_thumbnail_id())->post_content; ?></figcaption>
            </div>
            <figcaption><?php the_post_thumbnail_caption(); ?></figcaption>
          </figure>

-->


<div class="container">
    <div class="row mt-3 noticia pt-5">
        <div class="col-1 d-none d-lg-block mb-5 share">
            <ul class="sticky-top">
                <li><a href="https://www.facebook.com/sharer/sharer.php?title=Veja essa notícia!&text=Veja essa notícia: <?php the_title(); ?> Confira mais notícias do Grupo ISM <?php echo get_permalink(); ?>&description=Veja essa notícia!&u=<?php echo get_permalink(); ?>" class="fb rounded-top" data-link="share" social-network="Facebook" title="Compartilhar no Facebook" rel="nofollow noopener"><i class="fab fa-facebook-f"></i></a></li>
                <li><a href="https://twitter.com/intent/tweet?text=&title= &description= &status=Veja essa notícia: <?php the_title(); ?>? Acesse o endereço para descobrir 👉 <?php echo get_permalink(); ?>" class="tw" rel="nofollow noopener" data-link="share" social-network="Twitter" title="Compartilhar no Twitter"><i class="fab fa-twitter"></i></a></li>
                <li><a href="https://api.whatsapp.com/send?phone=&text= 😁 Veja essa notícia: <?php the_title(); ?>? Acesse o endereço para descobrir 👉 <?php echo get_permalink(); ?>" class="wapp" title="Compartilhar no WhatsApp" rel="nofollow noopener" data-link="share" social-network="WhatsApp"><i class="fab fa-whatsapp"></i></a></li>
                <li><a href="javascript:copy('#link')" class="url rounded-bottom" data-link="share" title="Copiar link da notícia" rel="nofollow noopener"><i class="fas fa-link"></i></a><span class="d-none" id="link"><?php echo get_permalink(); ?></span></li>
            </ul>
        </div>

        <div class="col-11 col-lg-7 mx-auto">
            <article id="conteudo" class="mb-4">
                <h1><?php echo the_title(); ?></h1>

                <?php 

                $resumo = get_the_excerpt(); 
                if ( has_excerpt() ) {
                    echo "<h2 class='subtitulo mt-3'>" . $resumo . "</h2>";
                }
                ?> 
                <div class="share">
                    <ul class="sticky-top d-none">
                        <li><a href="https://www.facebook.com/sharer/sharer.php?title=Veja essa notícia!&text=Veja essa notícia: <?php the_title(); ?> Confira mais notícias do Grupo ISM <?php echo get_permalink(); ?>&description=Veja essa notícia!&u=<?php echo get_permalink(); ?>" class="fb rounded-top" data-link="share" title="Compartilhar no Facebook" rel="nofollow noopener"><i class="fab fa-facebook-f"></i></a></li>
                        <li><a href="https://twitter.com/intent/tweet?text=&title= &description= &status=Veja essa notícia: <?php the_title(); ?>? Acesse o endereço para descobrir 👉 <?php echo get_permalink(); ?>" class="tw" rel="nofollow noopener"><i class="fab fa-twitter" title="Compartilhar no Twitter" data-link="share"></i></a></li>
                        <li><a href="https://api.whatsapp.com/send?phone=&text= 😁 Veja essa notícia: <?php the_title(); ?>? Acesse o endereço para descobrir 👉 <?php echo get_permalink(); ?>" class="wapp" title="Compartilhar no WhatsApp" rel="nofollow noopener"><i class="fab fa-whatsapp" data-link="share"></i></a></li>
                        <li><a href="javascript:copy('#link')" class="url rounded-bottom" data-link="share" title="Copiar link da notícia" rel="nofollow noopener"><i class="fas fa-link"></i></a><span class="d-none" id="link"><?php echo get_permalink(); ?></span></li>
                    </ul>
                    <p class="post-info">Postado em <?php the_date(); ?></p>
                </div>
                <figure class="my-3 text-center">
                    <div class="featured">
                        <?php the_post_thumbnail( array( 750 ) ); ?>
                        <figcaption class="credits"><?php echo get_post(get_post_thumbnail_id())->post_content; ?></figcaption>
                    </div>
                    <figcaption><?php the_post_thumbnail_caption(); ?></figcaption>
                </figure>
                <?php the_content(); ?>
            </article>
        </div>

        <div class="col-11 col-lg-4 mx-auto sidebar">
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
                        <div class="mb-4 news">
                            <div class="single">
                                <a href="<?php the_permalink(); ?>" data-link="related-news"><?php the_post_thumbnail($size='thumb-news'); ?></a>
                                <div class="p-4">
                                    <h2><a href="<?php the_permalink(); ?>" data-link="related-news"><?php the_title(); ?></a></h2>                            
                                </div>
                            </div>
                        </div>


                <?php
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

                <div class="mb-5 marcas">
                    <div class="single hover-marca">
                        <div class="row align-items-center">
                            <div class="col-7">
                                <div class="mx-3 mx-lg-5">
                                    <h2><a href="<?php echo get_permalink($id); ?>" data-link="related-brands"><?php echo get_the_title($id); ?></a></h2>
                                    <?php $excerpt = get_the_excerpt($id); ?>
                                    <p title="<?= $excerpt ?>"><?= $excerpt ?></p>
                                    <p><a href="<?php echo get_permalink($id); ?>" class="greenGradient" rel="nofollow" data-link="brands-knowmore">Saiba mais</a></p>
                                </div>
                            </div>
                            <div class="col-4 text-center">
                                <?php 
                                    $image = get_field('packshot', $id);
                                    $size = 'thumbnail';
                                    if( !empty( $image ) ): 
                                ?>
                                    <a href="<?php echo get_permalink($id); ?>" data-link="brands-packshot"><img src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr($image['alt']); ?>" /></a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
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