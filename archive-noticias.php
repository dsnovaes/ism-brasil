<script>
    var dataLayer = [];
    dataLayer.push({
    'contentGroup': 'News',
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
                <h1><?php $post_type_obj = get_post_type_object( 'noticias' ); echo $post_type_obj->labels->name ?></h1>
            </div>
        </div>
    <?php $desc = get_the_archive_description();
    if (!empty($desc)) { 
        echo "<div class='row'><div class='col-11 mx-auto mb-5'><div class='col-11 mx-auto'>". $desc . "</div></div></div>";
           }  
    ?>
    </div>
</div>

<div class="container">
    <div class="col-11 col-md-12 mx-auto mt-4 news">
        <div class="row">
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); $post_id = get_the_ID(); ?>
            <div class="col-12 col-md-6 col-lg-4 mx-auto">
                <div class="mb-4 single">
                    <a href="<?php the_permalink(); ?>" data-link="home-news"><?php the_post_thumbnail($size='thumb-news'); ?></a>
                    <div class="p-4">
                        <h2><a href="<?php the_permalink(); ?>" data-link="home-news" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
                        <p><?php echo get_excerpt(140, 'the_content'); ?></p>
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