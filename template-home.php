<script>
    var dataLayer = [];
    dataLayer.push({
    'contentGroup': 'Home',
    'contentLevel': 'Home'
    });
</script>
<?php
/*
    Template Name: Home
*/
get_header();
?>
<div class="greenGradient mx-auto titleBar mt-3 mb-5 bannerHome py-3">
    <div class="container">
        <div class="row">
            <div class="col-11 col-md-12 mx-auto">
                <div class="row">
                    <div class="col-11 col-md-6 col-lg-5 col-xl-4 mb-3 mx-auto">
                        <h1><?php echo the_title(); ?></h1>
                        <?php the_content(); ?> 
                        <p><a href="<?php echo get_permalink(41); ?>">Conheça nossa história</a></p>
                    </div>
                    <div class="col-11 col-md-6 col-lg-7 col-xl-8 mx-auto">
                        <?php the_post_thumbnail('featured'); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="col-11 col-md-12 mx-auto mt-5 marcas">
        <h2>Nossas marcas</h2>
        <div class="row">
            <?php
            $post_id = get_the_ID();

                    $related = new WP_Query(
                        array(
                            'post_type'   => 'marcas',
                            'posts_per_page' => 6
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
                <div class="mb-5 single hover-<?php echo $related_post; ?>-marca">
                    <div class="row align-items-center">
                        <div class="col-7">
                            <div class="mx-5">
                                <h2><a href="<?php the_permalink(); ?>" data-link="brands-title"><?php the_title(); ?></a></h2>
                                <p><?php the_excerpt(); ?></p>
                                <p><a href="<?php the_permalink(); ?>" class="greenGradient" rel="nofollow" data-link="brands-knowmore">Saiba mais</a></p>
                            </div>
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

<div class="container">
    <div class="col-11 col-md-12 mx-auto mt-5 news">
        <h2>Notícias</h2>
        <div class="row">
            <?php
            $post_id = get_the_ID();

                    $related = new WP_Query(
                        array(
                            'post_type'   => 'noticias',
                            'posts_per_page' => 3
                        )
                    );

                    if( $related->have_posts() ) { 
                        while( $related->have_posts() ) { 
                            $related->the_post(); $related_post = get_the_ID(); ?>
            <div class="col-12 col-md-6 col-lg-4 mx-auto">
                <div class="mb-4 single">
                    <a href="<?php the_permalink(); ?>" data-link="home-news"><?php the_post_thumbnail($size='thumb-news'); ?></a>
                    <div class="p-4">
                        <h2><a href="<?php the_permalink(); ?>" data-link="home-news"><?php the_title(); ?></a></h2>
                        <p><?php echo get_excerpt(140, 'the_content'); ?></p>
                    </div>
                </div>
            </div><?php
                        }
                        wp_reset_postdata(); ?>

</div>
        <div class="row justify-content-md-center">
            <div class="col-12 col-md-6 col-lg-4 mx-auto text-center">
                <a href="<?php echo get_post_type_archive_link('noticias') ?>" data-link="home-news" class="btn-ism">Veja mais notícias</a>
            </div>
        </div>
<?php
                    } ?>
    </div>
</div>
            
<?php
get_footer();
?>