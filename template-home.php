<script>
    var dataLayer = [];
    dataLayer.push({
    'content_type': 'Home'
  });
</script>
<?php
/*
    Template Name: Home
*/
get_header();
?>
<div class="container">.
    <div class="row">
        <div class="col-12 greenGradient mb-5 py-3 mt-3 title bannerHome">
            <div class="col-11 col-md-10 mx-auto">
                <div class="row">
                    <div class="col-11 col-md-6 col-lg-5 col-xl-4 mb-3 mx-auto">
                        <h1><?php echo the_title(); ?></h1>
                        <?php the_content(); ?> 
                    </div>
                    <div class="col-11 col-md-6 col-lg-7 col-xl-8 mx-auto">
                        <?php the_post_thumbnail( array( 730 ) ); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="col-10 mx-auto mt-5">
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
                <div class="p-5 mb-4 rounded marca hover-<?php echo $related_post; ?>-marca">
                <h2><a href="<?php the_permalink(); ?>" data-link="home-brands"><?php the_title(); ?></a></h2>
                <p><?php the_excerpt(); ?></p>
                </div>
            </div><?php
                        }
                        wp_reset_postdata();
                    } ?>
        </div>
    </div>
</div>

<div class="container">
    <div class="col-10 mx-auto mt-5 newsPage">
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
                <div class="mb-4 rounded marca">
                    <a href="<?php the_permalink(); ?>" data-link="home-news"><?php the_post_thumbnail( array( 430 ) ); ?></a>
                    <div class="p-4">
                        <h2><a href="<?php the_permalink(); ?>" data-link="home-news"><?php the_title(); ?></a></h2>
                        <p><?php the_excerpt(); ?></p>
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