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
    if( have_rows('timeline') ):
?>
<div class="container-fluid timeline">
    <div class="container py-5">
        <div class="row">
            <div class="col-12 mx-auto">
                <div class="col-11 mx-auto">
                    <h2>Nossa história</h2> 
                </div>  
                <div class="col-12 mx-auto timeline_featured">
                    <img src="<?php the_field('timeline_featured-img_desktop'); ?>" alt="Nossa história" class="d-md-block d-none">
                    <img src="<?php the_field('timeline_featured-img_mobile'); ?>" alt="Nossa história" class="d-md-none d-block"> 
                </div>
                <div class="col-11 mx-auto">
                    <div class="swiper swiper-timeline">
                        <div class="swiper-wrapper"> 
                            <?php
                                while( have_rows('timeline') ) : the_row();                        
                                $year = get_sub_field('timeline_year');
                                $text = get_sub_field('timeline_text');
                                $img = get_sub_field('timeline_img');  
                            ?>
                            <div class="swiper-slide">
                                <h3><?php echo $year; ?></h3>
                                <p><?php echo $text; ?></p>
                            </div>
                            <?php
                                endwhile;
                            ?>
                        </div>
                        <div class="swiper-page_numbers"></div>
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-button-next"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
var swiper = new Swiper('.swiper-timeline', {
    loop: false,
    pagination: {
        el: ".swiper-page_numbers",
        type: 'fraction',
    },
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
});
swiper.on('slideChange', function () {
    dataLayer.push({
    'event': 'swipe',
    'swiper': 'swiper-timeline'
    });
});
</script>

<?php                 
    endif;
    if( have_rows('valores') ):
?>            
<div class="container valores my-5 py-5">
    <div class="row my-5">
        <div class="col-12 mx-auto">
            <div class="col-11 mx-auto">
                <h2>Nossos valores</h2>   
                <div class="row">
                    <?php
                        while( have_rows('valores') ) : the_row();                            
                        $name = get_sub_field('valor_name');
                        $desc = get_sub_field('valor_desc');
                        $icon = get_sub_field('valor_icon');
                    ?>
                    <div class="col-12 col-md-6">
                        <div class="row">
                            <div class="col-2">
                                <img src="<?php echo $icon; ?>" alt="<?php echo $name; ?>">
                            </div>
                            <div class="col-10">
                                <h3><?php echo $name; ?></h3>
                                <p><?php echo $desc; ?></p>
                            </div>
                        </div>
                    </div>
                    <?php
                        endwhile;
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
    endif;
    if( have_rows('numbers') ):
?>            
<div class="container-fluid orangeGradient numbers">
    <div class="container">
        <div class="row my-5 py-5">
            <div class="col-12 mx-auto">
                <div class="col-11 mx-auto">
                    <div class="row">
                        <div class="col-11 col-md-5 col-lg-4">
                            <h2>ISM em números</h2>   
                        </div>
                        <div class="col-11 col-md-7 col-lg-6">
                            
                            <?php
                                while( have_rows('numbers') ) : the_row();
                                $name = get_sub_field('numbers_item-name');
                                $desc = get_sub_field('numbers_item-desc');
                                $icon = get_sub_field('numbers_item-icon');    
                            ?>
                            <div class="row mb-5">
                                <div class="col-2">
                                    <img src="<?php echo $icon; ?>" alt="<?php echo $name; ?>">
                                </div>
                                <div class="col-10">
                                    <h3><?php echo $name; ?></h3>
                                    <p><?php echo $desc; ?></p>
                                </div>
                            </div>
                            <?php
                                endwhile;
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
endif;
if( have_rows('quality_badges') ):
    ?>
<div class="container">
    <div class="col-12 mx-auto">
        <div class="col-11 mx-auto">
            <div class="row justify-content-center my-5 py-5 mx-auto">
                <h2>Qualidade comprovada</h2>   
                <?php
                    while( have_rows('quality_badges') ) : the_row();
                    $name = get_sub_field('quality_badges-name');
                    $desc = get_sub_field('quality_badges-desc');
                    $badge = get_sub_field('quality_badges-img');
                ?>
                <div class="col-12 col-md-6 col-lg-3 mx-auto mb-4">
                    <div class="quality_badge p-4">
                        <img src="<?php echo $badge; ?>" alt="<?php echo $name; ?>" class="mx-auto">
                        <h3><?php echo $name; ?></h3>
                        <?php echo $desc; ?>
                    </div>
                </div>

                <?php 
                    endwhile;
                ?>
            </div>
        </div>
    </div>
</div>

<?php
endif;
get_footer();
?>