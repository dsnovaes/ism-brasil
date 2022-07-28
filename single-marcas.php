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

<div class="greenGradient mx-auto titleBar mt-3 mb-5" style="background:<?php the_field('cor_da_marca'); ?>">
    <div class="container">
        <div class="row">
            <div class="col-11 col-md-12 mx-auto">
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

<main class="container" id="conteudo">
    <div class="row justify-content-between">
        <div class="col-11 col-md-6 col-lg-5 mb-3 mx-auto mx-md-0">
            <article>
                <?php the_content(); ?>                
            </article>
        </div>
        <div class="col-12 col-md-6 col-lg-7 text-end">
            <?php the_post_thumbnail('featured'); ?>
        </div>
    </div>

<?php  
    if( have_rows('variacoes') ):
?>
    <div class="row">
        <div class="col-11 col-md-8 mt-5 mx-auto">
            <h2>Variações de <?php echo the_title(); ?></h2>
        </div>
    </div>
    <?php 
        while( have_rows('variacoes') ) : the_row();   
        $name = get_sub_field('variacao_name');
        $text = get_sub_field('variacao_desc');
        $pic = get_sub_field('variacao_packshot');
        $image_url = $pic['sizes']['timeline-featured_mobile'];
            
    ?>
    <div class="row variacoes mx-auto justify-content-center mb-3">
        <div class="col-3 col-lg-2 col-md-3 text-center">
            <img src="<?= $image_url; ?>" alt="<?php echo the_title(); ?> - <?php echo $name; ?>"> 
        </div>
        <div class="col-9 col-lg-6 col-md-5 mb-3">
            <h3 <?php
if( get_sub_field('novo') ) { ?> class="novo"
<?php }?> ><?php echo $name; ?></h3>
            <?php echo $text; ?>
            <p><a href="#" data-link="brands-details">Informações nutricionais</a></p>
        </div>
    </div>
<?php
    endwhile;
?>  
            
<?php
// No value.
    else :
        
    endif;
?> 
</main>        




<!-- START NOTICIAS RELACIONADAS A MARCA -->

<?php
$post_id = get_the_ID();
$related = new WP_Query(
    array(
        'post_type'   => 'noticias',
        'post_status'   => 'publish',
        'posts_per_page' => 3,
        'orderby' => 'date',
        'meta_key'  => 'qual_marca',
        'meta_value'    => $post_id
    )
);

if( $related->have_posts() ) { 
?>
<aside class="container">
    <div class="col-11 col-md-12 mx-auto mt-5 news">
        <h2><?php the_title(); ?> em pauta</h2>
        <div class="row justify-content-center">
            <?php while( $related->have_posts() ) { 
            $related->the_post(); $related_post = get_the_ID(); ?>
            <div class="col-12 col-md-6 col-lg-4 mx-auto">
                <div class="mb-4 single">
                    <a href="<?php the_permalink(); ?>" data-link="brands-news"><?php the_post_thumbnail($size='thumb-news'); ?></a>
                    <div class="p-4">
                        <h2><a href="<?php the_permalink(); ?>" data-link="brands-news"><?php the_title(); ?></a></h2>
                        <p><?php echo get_excerpt(140, 'the_content'); ?></p>
                    </div>
                </div>
            </div>
        <?php
        }
            wp_reset_postdata();
        ?>
        </div>
        <div class="row justify-content-md-center">
            <div class="col-12 col-md-6 col-lg-4 mx-auto text-center">
                <a href="<?php echo get_post_type_archive_link('noticias') ?>" data-link="brands-news" class="btn-ism mb-5">Veja todas as notícias</a>
            </div>
        </div>
    </div>
</aside>
<?php
} 
?>



<!-- END NOTICIAS RELACIONADAS A MARCA -->


<aside class="container">
    <div class="col-11 col-md-12 mx-auto mt-5">
        <h2>Veja outras marcas</h2>
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
                $related->the_post(); $related_post = get_the_ID(); 
        ?>
            <div class="col-12 col-md-6 mx-auto marcas">
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
                <div class="mb-4 single hover-<?php echo $related_post; ?>-marca">
                    <div class="row align-items-center">
                        <div class="col-7">
                            <div class="mx-3 mx-lg-5">
                                <h2><a href="<?php the_permalink(); ?>" data-link="brands-title"><?php the_title(); ?></a></h2>
                                <p><?php the_excerpt(); ?></p>
                                <p><a href="<?php the_permalink(); ?>" class="greenGradient" rel="nofollow" data-link="brands-knowmore">Saiba mais</a></p>
                            </div>
                        </div>
                        <div class="col-4">
                            <?php 
                                $image = get_field('packshot');
                                $size = 'thumbnail';
                                if( !empty( $image ) ): 
                            ?>
                                <a href="<?php the_permalink(); ?>" data-link="brands-packshot"><img src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr($image['alt']); ?>" /></a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            }
                wp_reset_postdata();
            } 
            ?>
        </div>
    </div>
</aside>
            
<?php
get_footer();
?>