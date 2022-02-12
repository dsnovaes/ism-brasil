<script>
    var dataLayer = [];
    dataLayer.push({
    'contentGroup': 'Careers',
    'contentLevel': 'Single'
    });
</script>
<?php
/*
    Template Name: Trabalhe Conosco
*/
get_header();
?>
<div class="container">
    <div class="row">
        <div class="col-12 greenGradient mb-5 mt-3 title">
            <div class="col-11 col-md-10 mx-auto">
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
                <p><a href="<?php the_field('external_jobs_url'); ?>" class="external-jobs"><?php the_field('external_jobs_label'); ?></a></p>
            </div>
        </article>
    </div>
</div>

<div class="container my-5 py-5 testemonials">
    <div class="row my-5">
        <div class="col-11 col-md-12 mx-auto">
            <div class="swiper-testemonials">
                <div class="swiper-wrapper"> 
                    <?php

                    // Check rows exists.
                    if( have_rows('testemonials') ):

                    // Loop through rows.
                    while( have_rows('testemonials') ) : the_row();

                        // Load sub field value.
                        $name = get_sub_field('testemonial_name');
                        $position = get_sub_field('testemonial_position');
                        $text = get_sub_field('testemonial_text');
                        $pic = get_sub_field('testemonial_img');
                        // Do something...
                        ?>
                        <div class="swiper-slide">
                            <blockquote><?php echo $text; ?></blockquote>
                            <img src="<?php echo $pic; ?>" alt="<?php echo $name; ?>">
                            <h3><?php echo $name; ?></h3>
                            <p class="position"><?php echo $position; ?></p>
                        </div>
                        <?php
                    // End loop.
                    endwhile;

                    // No value.
                    else :
                        // Do something...
                    endif;
                    ?>
                </div>
                <div class="swiper-button-prev"></div>
				<div class="swiper-button-next"></div>
            </div>
        </div>
    </div>
</div>

<script>
var swiper = new Swiper('.swiper-testemonials', {
    slidesPerView: 1,
    slidesPerGroup: 1,
    loop: true,
    loopFillGroupWithBlank: true,
    navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
    },
})
</script>

<?php
get_footer();
?>