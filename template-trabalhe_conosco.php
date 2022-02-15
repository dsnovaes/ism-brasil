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
                <p class="text-center"><a href="<?php the_field('external_jobs_url'); ?>" class="external-jobs" datalink="careers-button"><?php the_field('external_jobs_label'); ?></a></p>
            </div>
        </article>
    </div>
</div>
<?php

// Check rows exists.
if( have_rows('testemonials') ):
    ?>
<div class="container-fluid testemonials">
    <div class="container my-5">
        <div class="row my-5">
            <div class="col-11 col-md-12 mx-auto">
                <div class="swiper-testemonials">
                    <div class="swiper-wrapper"> 
                        <?php

                        // Loop through rows.
                        while( have_rows('testemonials') ) : the_row();

                            // Load sub field value.
                            $name = get_sub_field('testemonial_name');
                            $position = get_sub_field('testemonial_position');
                            $text = get_sub_field('testemonial_text');
                            $pic = get_sub_field('testemonial_img');
                            // Do something...
                            ?>
                            <div class="row swiper-slide justify-content-center align-items-center">
                                <div class="col-12 col-md-3 mx-3">
                                    <img src="<?php echo $pic; ?>" alt="<?php echo $name; ?>">
                                </div>
                                <div class="col-12 col-md-7">
                                    <blockquote><?php echo $text; ?></blockquote>
                                    <h3><?php echo $name; ?></h3>
                                    <p class="position"><?php echo $position; ?></p>
                                </div>
                            </div>
                            <?php
                        // End loop.
                        endwhile;

                        // No value.
                        else :
                            // Do something...
                        ?>
                    </div>
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
var swiper = new Swiper('.swiper-testemonials', {
    slidesPerView: 1,
    spaceBetween: 120,
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
endif;
?>


<?php

// Check rows exists.
if( have_rows('highlights') ):
    ?>
<div class="container-fluid highlights">
    <div class="row my-5">
                    <?php
                    // Loop through rows.
                    while( have_rows('highlights') ) : the_row();

                        // Load sub field value.
                        $title = get_sub_field('highlight_title');
                        $text = get_sub_field('highlight_text');
                        $pic = get_sub_field('highlight_img');
                        // Do something...
                        ?>
                        <h2><?php echo $title; ?></h2>
                        <?php
                    // End loop.
                    endwhile;

                    // No value.
                    else :
                        // Do something...
                    ?>
    </div>
</div>
<?php
endif;
?>

<?php 
$var = get_the_field('external_jobs_url');
if(!isEmpty($var)) { ?>
<p class="text-center"><a href="<?php the_field('external_jobs_url'); ?>" class="external-jobs" datalink="careers-button"><?php the_field('external_jobs_label'); ?></a></p>
<?php } ?>


<?php
get_footer();
?>