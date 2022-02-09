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
        <div class="col-12 greenGradient mb-5 mt-3 title">
            <div class="col-11 col-md-10 mx-auto">
                <h1><?php echo the_title(); ?></h1>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-11 col-md-10 mx-auto">
            <div class="row">
                <div class="col-12 col-md-4"><p><?php the_field('intro') ?></p></div>
                <div class="col-12 col-md-8"><?php the_post_thumbnail('single-news'); ?></div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row my-5">
        <div class="col-11 col-md-8 mx-auto"><?php the_field('text_center') ?></div>
    </div>
</div>

<div class="container">
    <div class="row my-5">
        <div class="col-11 col-md-12 mx-auto">
            <h2>Nossa história</h2>   
            <div class="swiper-timeline">
                <div class="swiper-wrapper"> 
                    <?php

                    // Check rows exists.
                    if( have_rows('timeline') ):

                    // Loop through rows.
                    while( have_rows('timeline') ) : the_row();

                        // Load sub field value.
                        $year = get_sub_field('timeline_year');
                        $text = get_sub_field('timeline_text');
                        $img = get_sub_field('timeline_img');
                        // Do something...
                        ?>
                        <div class="swiper-slide">
                            <h3><?php echo $year; ?></h3>
                            <p><?php echo $text; ?></p>
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
	const swiper = new Swiper('.swiper-timeline', {
      slidesPerView: 1,
      spaceBetween: 0,
      loop: false,
      loopFillGroupWithBlank: true,
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
    })

</script>

<?php
get_footer();
?>