<script>
    var dataLayer = [];
    dataLayer.push({
    'contentGroup': 'About',
    'contentLevel': 'Single'
    });
</script>
<?php
/*
    Template Name: Sobre a ISM
*/
get_header();
?>
<div class="container">
    <div class="row">
        <div class="col-12 greenGradient mb-5 py-3 mt-3 title bannerHome">
            <div class="col-11 col-md-10 mx-auto">
                <div class="row">
                    <div class="col-11 col-md-6 col-lg-5 col-xl-4 mb-3 mx-auto">
                        <h1><?php echo the_title(); ?></h1>
                    </div>
                    <div class="col-11 col-md-6 col-lg-7 col-xl-8 mx-auto">
                        <?php the_post_thumbnail( array( 730,400 ) ); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-3"><?php the_field('intro') ?></div>
        <div class="col-9">aqui vai a imagem</div>
    </div>
</div>

            
<?php
get_footer();
?>