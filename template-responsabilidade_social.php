<script>
    var dataLayer = [];
    dataLayer.push({
    'contentGroup': 'Social',
    'contentLevel': 'Single'
    });
</script>
<?php
/*
    Template Name: Responsabilidade Social
*/
get_header();
?>

<div class="greenGradient mx-auto titleBar mt-3 mb-4">
    <div class="container">
        <div class="row">
            <div class="col-11 col-md-12 mx-auto">
                <h1><?php echo the_title(); ?></h1>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <article id="conteudo">
            <div class="col-11 col-md-8 mx-auto">
                <?php the_content(); ?>
            </div>
        </article>
    </div>
</div>

<?php
    if( have_rows('actions') ):
?>
<div class="highlights">
<?php
    while( have_rows('actions') ) : the_row();
    $subtitle = get_sub_field('social_subtitle');
    $title = get_sub_field('social_title');
    $text = get_sub_field('social_desc');
    $img = get_sub_field('social_image');
    $img_url = $img['sizes']['timeline-featured_mobile'];
    $img_description = $img['description'];
?>
    <div class="container-fluid my-5">
        <div class="container">
            <div class="col-11 col-md-12 mx-auto">
                <div class="row justify-content-between my-5">
                    <div class="col-12 col-md-5">
                        <figure>
                            <img src="<?= $img_url ?>" alt="<?= $title; ?>">
                            <figcaption><?= $img_description ?></figcaption>
                        </figure>
                    </div>
                    <div class="col-12 col-md-6 my-5 py-5">
                        <h2><?= $subtitle; ?></h2>
                        <h3><?= $title; ?></h3>
                        <p><?= $text; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
    endwhile;
?>
</div>
<?php
    endif;
?>

<?php
get_footer();
?>