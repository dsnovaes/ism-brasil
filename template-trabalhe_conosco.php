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
                <p class="text-center"><a href="<?php the_field('external_jobs_url'); ?>" class="external-jobs" datalink="careers-button"><?php the_field('external_jobs_label'); ?></a></p>
            </div>
        </article>
    </div>
</div>

<?php
    if( have_rows('testimonials') ):
?>
<div class="container-fluid testimonials">
    <div class="container my-5">
        <div class="row my-5">
            <div class="col-11 col-md-12 mx-auto">
                <div class="swiper-testimonials">
                    <div class="swiper-wrapper"> 
                        <?php
                            while( have_rows('testimonials') ) : the_row();
                            $name = get_sub_field('testimonial_name');
                            $position = get_sub_field('testimonial_position');
                            $text = get_sub_field('testimonial_text');
                            $pic = get_sub_field('testimonial_img');
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
                            endwhile;
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
var swiper = new Swiper('.swiper-testimonials', {
    slidesPerView: 1,
    spaceBetween: 120,
    slidesPerGroup: 1,
    loop: true,
    loopFillGroupWithBlank: true,
    navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
    },
});
swiper.on('slideChange', function () {
    dataLayer.push({
    'event': 'swipe',
    'swiper': 'swiper-testimonials'
    });
});
</script>
<?php
    endif;
    if( have_rows('highlights') ):
?>
<div class="container-fluid my-5 highlights">
    <div class="row my-5">
                    <?php
                        while( have_rows('highlights') ) : the_row();
                        $title = get_sub_field('highlight_title');
                        $text = get_sub_field('highlight_text');
                        $pic = get_sub_field('highlight_img');
                    ?>
                    <h2><?php echo $title; ?></h2>
                    <p><?= $text; ?></p>
                    <?php
                        endwhile;
                    ?>
    </div>
</div>
<?php
    endif;
?>

<?php
get_footer();
?>