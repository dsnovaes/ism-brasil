<script>
    var dataLayer = [];
    dataLayer.push({
    'contentGroup': 'Brands',
    'contentLevel': 'Archive'
    });
</script>
<?php
get_header();
?>

<div class="greenGradient mx-auto titleBar mt-3 mb-4">
    <div class="container">
        <div class="row">
            <div class="col-11 col-md-12 mx-auto">
                <h1><?php $post_type_obj = get_post_type_object( 'marcas' ); echo $post_type_obj->labels->name ?></h1>
            </div>
        </div>
    <?php 
    $desc = get_the_archive_description();
    if (!empty($desc)) { 
        echo "<div class='row'><div class='col-11 mx-auto mb-5'><div class='col-11 mx-auto'>". $desc . "</div></div></div>";
           }  
    ?>
    </div>
</div>

<div class="container">
    <div class="col-11 col-md-12 mx-auto">
        <div class="row justify-content-between">
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); $post_id = get_the_ID(); ?>
            <div class="col-12 col-lg-6 mx-auto marcas">
                <style type="text/css">
                        .hover-<?php echo $post_id; ?>-marca:hover {
                            background-color: <?php the_field('cor_da_marca', $post_id) ?>;
                            color: <?php the_field('cor_secundaria', $post_id) ?>;
                            border-color: <?php the_field('cor_da_marca', $post_id) ?>;
                        }
                        .hover-<?php echo $post_id; ?>-marca:hover h2 a {
                            color: <?php the_field('cor_secundaria', $post_id) ?> !important;
                        }
                        .hover-<?php echo $post_id; ?>-marca:hover p {
                            color: <?php the_field('cor_secundaria', $post_id) ?> !important;
                            opacity: 0.5;
                        }
                    </style>
                <div class="mb-5 single hover-<?php echo $post_id; ?>-marca">
                    <div class="row align-items-center">
                        <div class="col-7">
                            <div class="mx-3 mx-lg-5">
                                <h2><a href="<?php the_permalink(); ?>" data-link="brands-title"><?php the_title(); ?></a></h2>
                                <?php $excerpt = get_the_excerpt($id); ?>
                                <p title="<?= $excerpt ?>"><?= $excerpt ?></p>
                                <p><a href="<?php the_permalink(); ?>" class="greenGradient" rel="nofollow" data-link="brands-knowmore">Saiba mais</a> <?php if( get_field('link_ml') ) { ?><a href="<?php the_field('link_ml'); ?>" rel="nofollow" class="greenGradient" data-link="brands-buy">Comprar agora</a><?php }; ?></p>
                            </div>
                        </div>
                        <div class="col-4 text-center">
                            <?php 
                            $image = get_field('packshot');
                            $size = 'thumbnail';
                            if( !empty( $image ) ): ?>
                                <a href="<?php the_permalink(); ?>" data-link="brands-packshot"><img src="<?php echo esc_url($image); ?>" alt="<?php the_title(); ?>" /></a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php endwhile; else: ?>
            <p><?php _e('<div class="alert alert-danger" role="alert">Desculpe, nenhuma publicação encontrada.</div>'); ?></p>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php
get_footer();
?>