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
                <div class="col-12 col-md-10 col-lg-4 mx-auto mb-3"><p><?php the_field('intro') ?></p></div>
                <div class="col-12 col-md-12 col-lg-8">
                    <figure>
                        <?php the_post_thumbnail('single-news'); ?>
                        <figcaption><?php the_post_thumbnail_caption(); ?></figcaption>
                    </figure>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row my-5">
        <article id="conteudo">
            <div class="col-11 col-md-8 mx-auto">
                <?php the_content(); ?>
            </div>
        </article>
    </div>
</div>
<?php
// Check rows exists.
if( have_rows('timeline') ):
?>
<div class="container my-5 py-5 timeline">
    <div class="row my-5">
        <div class="col-11 col-md-12 mx-auto">
            <h2>Nossa história</h2>   
            <div class="swiper swiper-timeline">
                <div class="swiper-wrapper"> 
                    <?php

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
                    ?>
                </div>
                <div class="swiper-button-prev"></div>
				<div class="swiper-button-next"></div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </div>
</div>
<script>
var swiper = new Swiper('.swiper-timeline', {
    slidesPerView: 1,
    slidesPerGroup: 1,
    loop: false,
    loopFillGroupWithBlank: true,
    pagination: {
    el: ".swiper-pagination",
    type: "fraction",
    clickable: true,
    },
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
if( have_rows('valores') ):
    ?>
<div class="container valores my-5 py-5">
    <div class="row my-5">
        <div class="col-11 col-md-12 mx-auto">
            <h2>Nossos valores</h2>   
            <div class="col-12 col-md-8 mx-auto">
                <div class="row">
                <?php
                // Loop through rows.
                while( have_rows('valores') ) : the_row();

                    // Load sub field value.
                    $name = get_sub_field('valor_name');
                    $desc = get_sub_field('valor_desc');
                    // Do something...
                    ?>
                    <div class="col-12 col-md-6 valor">
                        <h3><?php echo $name; ?></h3>
                        <p><?php echo $desc; ?></p>
                    </div>
                    <?php
                // End loop.
                endwhile;

                // No value.
                else :
                    // Do something...
                ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
endif;

// Check rows exists.
if( have_rows('numbers') ):
    ?>            
<div class="container-fluid orangeGradient numbers">
    <div class="container">
        <div class="row my-5 py-5">
            <div class="col-12 mx-auto">
                <div class="row">
                    <div class="col-11 col-md-4">
                        <h2>ISM em números</h2>   
                    </div>
                    <div class="col-11 col-md-6 col-lg-4">
                        <?php

                        // Loop through rows.
                        while( have_rows('numbers') ) : the_row();

                            // Load sub field value.
                            $name = get_sub_field('numbers_item-name');
                            $desc = get_sub_field('numbers_item-desc');
                            $icon = get_sub_field('numbers_item-icon');
                            // Do something...
                            ?>
                            <div class="number mb-5">
                                <h3><?php echo $name; ?></h3>
                                <?php echo $desc; ?>
                            </div>
                            <?php
                        // End loop.
                        endwhile;

                        // No value.
                        else :
                            // Do something...
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
endif;
// Check rows exists.
if( have_rows('quality_badges') ):
?>
<div class="container">
    <div class="col-11 col-md-12">
        <div class="row justify-content-center my-5 py-5 mx-auto">
            <h2>Qualidade comprovada</h2>   
            <?php
                // Loop through rows.
                while( have_rows('quality_badges') ) : the_row();
                // Load sub field value.
                $name = get_sub_field('quality_badges-name');
                $desc = get_sub_field('quality_badges-desc');
                $img = get_sub_field('quality_badges-img');
                // Do something...
                ?>
                <div class="col-12 col-md-6 col-lg-3 mx-auto mb-4">
                    <div class="quality_badge p-4">
                        <h3><?php echo $name; ?></h3>
                        <?php echo $desc; ?>
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
    </div>
</div>
<?php
endif;
?>
<?php
get_footer();
?>