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

<div class="container">
    <div class="row">
        <div class="col-12 greenGradient mb-2 mt-3 title">
            <div class="col-11 col-md-10 mx-auto">
                <h1><?php $post_type_obj = get_post_type_object( 'noticias' ); echo $post_type_obj->labels->name ?></h1>
            </div>
        </div>
    </div>
    <?php $desc = get_the_archive_description();
    if (!empty($desc)) { 
        echo "<div class='row'><div class='col-11 col-md-10 mx-auto mb-5'><div class='col-5'>". $desc . "</div></div></div>";
           }  
    ?>
</div>

<div class="container newsPage">
    <div class="col-11 col-md-10 mx-auto">
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); $post_id = get_the_ID(); ?>
        <div class="row single-news my-3">
            <?php if ( has_post_thumbnail() ) { ?>
            <div class="col-2">
                <a href="<?php the_permalink(); ?>" data-link="home-news"><?php the_post_thumbnail('thumbnail'); ?></a>
            </div>
       <?php  } else {} ?>

            <div class="col-10">
                <div class="py-5">
                <h2><a href="<?php the_permalink(); ?>" data-link="news"><?php the_title(); ?></a></h2>
                <p><?php echo excerpt(15); ?></p>
                </div>
            </div>
        </div>
        <?php endwhile; else: ?>
        <p><?php _e('<div class="alert alert-danger" role="alert">Desculpe, nenhuma publicação encontrada.</div>'); ?></p>
        <?php endif; ?>
    </div>
</div>

<?php
get_footer();
?>