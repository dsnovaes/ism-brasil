<script>
    var dataLayer = [];
    dataLayer.push({
    'content_type': 'Marcas'
  });
</script>
<?php
get_header();
?>

<div class="container">
    <div class="row">
        <div class="col-12 greenGradient mb-5 mt-3 title">
            <div class="col-10 mx-auto">
                <h1><?php $post_type_obj = get_post_type_object( 'marcas' ); echo $post_type_obj->labels->name ?></h1>
            </div>
        </div>
    </div>
    <?php $desc = get_the_archive_description();
    if (!empty($desc)) { 
        echo "<div class='row'><div class='col-11 mx-auto mb-5'><div class='col-11 mx-auto'>". $desc . "</div></div></div>";
           }  
    ?>
</div>

<div class="container">
    <div class="col-10 mx-auto">
        <div class="row justify-content-between">
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); $post_id = get_the_ID(); ?>
            <div class="col-12 col-lg-6 mx-auto">
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
                <div class="mb-5 rounded marca hover-<?php echo $post_id; ?>-marca">
                    <div class="row align-items-center">
                        <div class="col-7 p-5">
                            <h2><a href="<?php the_permalink(); ?>" data-link="brands-title"><?php the_title(); ?></a></h2>
                            <p><?php the_excerpt(); ?></p>
                            <p><a href="<?php the_permalink(); ?>" class="greenGradient" rel="nofollow" data-link="brands-knowmore">Saiba mais</a></p>
                        </div>
                        <div class="col-4 p-3">
                            <?php 
                            $image = get_field('packshot');
                            $size = 'thumbnail';
                            if( !empty( $image ) ): ?>
                                <a href="<?php the_permalink(); ?>" data-link="brands-packshot"><img src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr($image['alt']); ?>" /></a>
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