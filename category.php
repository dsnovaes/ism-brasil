<script>
    var dataLayer = [];
    dataLayer.push({
    'content_type': 'Noticias'
  });
</script>
<?php
get_header();
?>

<div class="container">
    <div class="row">
        <div class="col-12 greenGradient mb-5 mt-3 title">
            <div class="col-11 col-md-10 mx-auto">
                <h1><?php single_cat_title(); ?></h1>
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
        <div class="row">
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); $post_id = get_the_ID(); ?>
        <div class="col-12 col-md-6 col-lg-4">
            <div class="p-4 mb-4 rounded marca">
            <h2><a href="<?php the_permalink(); ?>" data-link="news"><?php the_title(); ?></a></h2>
            <p><?php echo excerpt(15); ?></p>
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