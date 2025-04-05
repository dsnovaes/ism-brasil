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
        <div class="col-11 col-md-12 mx-auto">
            <div class="row">
                <div class="col-12 col-lg-4 mx-auto mb-3"><p><?php the_field('intro') ?></p></div>
                <div class="col-12 col-lg-8">
                    <figure>
                        <?php the_post_thumbnail('featured'); ?>
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
            <div class="col-11 col-md-12 col-lg-8 mx-auto">
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
                    <h2>Conheça nossa história</h2> 
                <div class="col-12 mx-auto timeline_featured">
                    <?php
                        $img_desktop = get_field('timeline_featured-img_desktop');
                        $image_url_desktop = $img_desktop['sizes']['timeline-featured_desktop'];
                        $img_mobile = get_field('timeline_featured-img_mobile');
                        $image_url_mobile = $img_mobile['sizes']['timeline-featured_mobile'];
                    ?>
                    <img src="<?= $image_url_desktop; ?>" alt="Nossa história" class="d-md-block d-none">
                    <img src="<?= $image_url_mobile; ?>" alt="Nossa história" class="d-md-none d-block"> 
                </div>
                <div class="col-12 mx-auto">
                    <div class="swiper swiper-timeline">
                        <div class="swiper-wrapper"> 
                            <?php
                                while( have_rows('timeline') ) : the_row();                        
                                $year = get_sub_field('timeline_year');
                                $text = get_sub_field('timeline_text');
                                $img = get_sub_field('timeline_img');  
                                $image_url = $img['sizes']['timeline'];
                            ?>
                            <div class="row swiper-slide mx-auto">
                                <div class="col-12 col-md-6">
                                    <h3><?= $year; ?></h3>
                                    <p><?= $text; ?></p>
                                </div>
                                <div class="col-12 col-md-6">
                                    <img src="<?= $image_url; ?>" alt="<?= $year; ?>">
                                </div>
                            </div>
                            <?php
                                endwhile;
                            ?>
                        </div>
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-page_numbers"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
var swiper = new Swiper('.swiper-timeline', {
	spaceBetween: 0,
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
    ?>
<div class="container culture mb-5 py-5">
    <div class="row mb-5">
        <div class="col-12 mx-auto">
        <h2>Cultura ISM</h2>
        <?php
        if( have_rows('verbos') ): ?>
            <div class="row my-5 g-2 verbs"> 
            <?php 
            while( have_rows('verbos') ) : the_row();
                $verbo = get_sub_field('verbo');
                ?>
                <div class="col py-2 text-center verb"><?= $verbo; ?>+</div>
                <?php
            endwhile; ?>
            </div>
        <?php endif; ?>
        <div class="col-11 col-md-12 col-lg-6 mx-auto py-3">
            <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 941.71 140.8">
                <path fill="#1c3c1c" d="M899.53,49.77c-2.19,0-3.79-2.07-3.24-4.19l6.78-26.2c1.84-7.13-1.33-16.98-12.65-16.98h-23.49s0,0,0,0l-11.6,44.84c-.38,1.48-1.72,2.51-3.24,2.51h-27.88c-5.1,0-18.05,4-21.4,16.97l-4.98,19.24c-.55,2.12,1.05,4.19,3.24,4.19h38.84c2.19,0,3.79,2.07,3.24,4.19l-6.78,26.2c-2.42,9.37,3.22,17,12.64,17h20.89c1.53,0,2.86-1.03,3.24-2.51l10.96-42.36c.38-1.48,1.72-2.51,3.24-2.51h27.85c9.43,0,19.01-7.6,21.43-16.97l4.98-19.23c.55-2.12-1.05-4.19-3.24-4.19h-38.84Z"/>
                <path fill="#0aac4b" d="M59.45,140.8c-5.05,0-10.35-.5-15.9-1.51-5.55-1.01-10.98-2.52-16.27-4.54-5.3-2.02-10.39-4.54-15.27-7.57-3.93-2.44-7.59-5.26-10.98-8.47-1.35-1.28-1.39-3.42-.1-4.76l17.59-18.19c1.27-1.31,3.35-1.36,4.68-.12,6.29,5.83,12.65,9.86,19.08,12.1,7.23,2.52,13.9,3.79,20.01,3.79,5.18,0,9.24-1.01,12.17-3.03,2.93-2.02,4.4-4.96,4.4-8.83,0-2.52-1.44-4.75-4.31-6.69-2.87-1.93-6.67-3.91-11.41-5.93-5.41-2.18-10.48-4.5-15.21-6.94-4.73-2.44-8.91-5.17-12.55-8.2-3.63-3.03-6.5-6.52-8.62-10.47-2.11-3.95-3.17-8.62-3.17-14,0-6.73,1.27-12.99,3.8-18.8,2.54-5.8,6.13-10.81,10.77-15.01,4.64-4.2,10.35-7.53,17.11-9.97,6.76-2.44,14.36-3.66,22.82-3.66,5.55,0,10.89.55,16.02,1.64,5.13,1.1,10.01,2.57,14.63,4.42,4.63,1.85,8.83,3.91,12.62,6.18,2.64,1.58,5.06,3.23,7.25,4.94,1.52,1.18,1.76,3.38.51,4.84l-16.42,19.22c-1.15,1.34-3.14,1.55-4.55.5-5.63-4.21-10.94-7.27-15.93-9.18-5.72-2.18-11.38-3.28-16.99-3.28-4.84,0-8.61,1.01-11.29,3.03-2.68,2.02-4.02,4.79-4.02,8.33,0,2.69,1.6,5.09,4.8,7.19,3.2,2.1,7.74,4.42,13.62,6.94,4.34,2.02,8.73,4.12,13.16,6.31,4.43,2.19,8.39,4.79,11.9,7.82,3.51,3.03,6.35,6.52,8.52,10.47,2.17,3.95,3.26,8.54,3.26,13.75,0,7.4-1.4,14.05-4.18,19.93-2.79,5.89-6.64,10.89-11.53,15.01-4.9,4.12-10.77,7.28-17.62,9.46-6.84,2.18-14.32,3.28-22.43,3.28Z"/>
                <path fill="#0aac4b" d="M194.19,140.8c-10.09,0-19.14-1.56-27.12-4.67-7.99-3.11-14.81-7.44-20.44-13-5.64-5.55-9.97-12.15-12.99-19.81-3.03-7.65-4.54-16.02-4.54-25.11,0-10.09,2.02-19.85,6.06-29.27,4.04-9.42,9.59-17.75,16.65-24.98,7.07-7.23,15.35-13.03,24.85-17.41,9.5-4.37,19.72-6.56,30.66-6.56,10.09,0,19.13,1.56,27.13,4.67,7.99,3.12,14.8,7.44,20.44,13,5.64,5.55,9.97,12.16,13,19.81,3.03,7.66,4.54,16.02,4.54,25.11,0,10.09-2.06,19.85-6.18,29.27-4.12,9.42-9.71,17.75-16.78,24.98-7.07,7.24-15.35,13.04-24.85,17.41-9.5,4.37-19.64,6.56-30.41,6.56ZM195.96,108c5.89,0,11.23-1.43,16.02-4.29,4.79-2.86,8.87-6.44,12.24-10.72,3.36-4.29,5.97-9.04,7.82-14.26,1.85-5.21,2.78-10.26,2.78-15.14,0-9.92-2.69-17.54-8.07-22.84-5.39-5.3-12.45-7.95-21.2-7.95-5.89,0-11.23,1.43-16.02,4.29-4.79,2.86-8.87,6.44-12.24,10.72-3.37,4.29-5.97,9.08-7.82,14.38-1.85,5.3-2.78,10.31-2.78,15.01,0,9.93,2.69,17.54,8.07,22.84,5.38,5.3,12.45,7.95,21.19,7.95Z"/>
                <path fill="#0aac4b" d="M308.29,2.52h31.42c2.2,0,3.8,2.09,3.23,4.21h0c-.81,3.03,2.63,5.44,5.17,3.59s5.28-3.64,8.07-5.28c5.72-3.36,12.36-5.05,19.93-5.05,9.25,0,16.86,2.19,22.84,6.56,4.68,3.43,8.36,7.84,11.02,13.24,1.02,2.06,3.82,2.44,5.39.76,5.12-5.47,10.96-10.05,17.52-13.74,8.07-4.54,17.24-6.81,27.5-6.81,12.03,0,21.52,3.49,28.46,10.47,6.94,6.98,10.41,16.61,10.41,28.89,0,3.87-.46,8.04-1.38,12.49-.92,4.46-1.97,8.87-3.13,13.25l-18.65,70.18c-.39,1.47-1.72,2.49-3.24,2.49h-31.31c-2.2,0-3.8-2.09-3.23-4.22l18.8-69.97c.5-1.85.92-3.91,1.26-6.18.33-2.27.5-4.25.5-5.93,0-11.1-5.97-16.65-17.92-16.65-7.57,0-13.71,2.49-18.42,7.44-4.71,4.96-8.16,11.48-10.34,19.56l-19.77,73.47c-.39,1.46-1.72,2.48-3.23,2.48h-31.42c-2.2,0-3.8-2.09-3.23-4.22l18.8-69.97c.5-1.85.92-3.91,1.26-6.18.33-2.27.5-4.25.5-5.93,0-11.1-5.97-16.65-17.91-16.65-7.57,0-13.71,2.49-18.42,7.44-4.71,4.96-8.16,11.48-10.35,19.56l-19.77,73.47c-.39,1.46-1.72,2.48-3.23,2.48h-31.43c-2.2,0-3.8-2.09-3.23-4.21L305.06,5.01c.39-1.47,1.72-2.48,3.23-2.48Z"/>
                <path fill="#0aac4b" d="M572.93,140.8c-10.09,0-19.14-1.56-27.12-4.67-7.99-3.11-14.81-7.44-20.44-13-5.64-5.55-9.97-12.15-12.99-19.81-3.03-7.65-4.54-16.02-4.54-25.11,0-10.09,2.02-19.85,6.06-29.27,4.04-9.42,9.59-17.75,16.65-24.98,7.07-7.23,15.35-13.03,24.85-17.41,9.5-4.37,19.72-6.56,30.66-6.56,10.09,0,19.13,1.56,27.13,4.67,7.99,3.12,14.8,7.44,20.44,13,5.64,5.55,9.97,12.16,13,19.81,3.03,7.66,4.54,16.02,4.54,25.11,0,10.09-2.06,19.85-6.18,29.27-4.12,9.42-9.71,17.75-16.78,24.98-7.07,7.24-15.35,13.04-24.85,17.41-9.5,4.37-19.64,6.56-30.41,6.56ZM574.7,108c5.89,0,11.23-1.43,16.02-4.29,4.79-2.86,8.87-6.44,12.24-10.72,3.36-4.29,5.97-9.04,7.82-14.26,1.85-5.21,2.78-10.26,2.78-15.14,0-9.92-2.69-17.54-8.07-22.84-5.39-5.3-12.45-7.95-21.2-7.95-5.89,0-11.23,1.43-16.02,4.29-4.79,2.86-8.87,6.44-12.24,10.72-3.37,4.29-5.97,9.08-7.82,14.38-1.85,5.3-2.78,10.31-2.78,15.01,0,9.93,2.69,17.54,8.07,22.84,5.38,5.3,12.45,7.95,21.19,7.95Z"/>
                <path fill="#0aac4b" d="M703.63,140.8c-5.05,0-10.35-.5-15.9-1.51-5.55-1.01-10.98-2.52-16.27-4.54-5.3-2.02-10.39-4.54-15.27-7.57-3.93-2.44-7.59-5.26-10.98-8.47-1.35-1.28-1.39-3.42-.1-4.76l17.59-18.19c1.27-1.31,3.35-1.36,4.68-.12,6.29,5.83,12.65,9.86,19.08,12.1,7.23,2.52,13.9,3.79,20.01,3.79,5.18,0,9.24-1.01,12.17-3.03,2.93-2.02,4.4-4.96,4.4-8.83,0-2.52-1.44-4.75-4.31-6.69-2.87-1.93-6.67-3.91-11.41-5.93-5.41-2.18-10.48-4.5-15.21-6.94-4.73-2.44-8.91-5.17-12.55-8.2-3.63-3.03-6.5-6.52-8.62-10.47-2.11-3.95-3.17-8.62-3.17-14,0-6.73,1.27-12.99,3.8-18.8,2.54-5.8,6.13-10.81,10.77-15.01,4.64-4.2,10.35-7.53,17.11-9.97,6.76-2.44,14.36-3.66,22.82-3.66,5.55,0,10.89.55,16.02,1.64,5.13,1.1,10.01,2.57,14.63,4.42,4.63,1.85,8.83,3.91,12.62,6.18,2.64,1.58,5.06,3.23,7.25,4.94,1.52,1.18,1.76,3.38.51,4.84l-16.42,19.22c-1.15,1.34-3.14,1.55-4.55.5-5.63-4.21-10.94-7.27-15.93-9.18-5.72-2.18-11.38-3.28-16.99-3.28-4.84,0-8.61,1.01-11.29,3.03-2.68,2.02-4.02,4.79-4.02,8.33,0,2.69,1.6,5.09,4.8,7.19,3.2,2.1,7.74,4.42,13.62,6.94,4.34,2.02,8.73,4.12,13.16,6.31,4.43,2.19,8.39,4.79,11.9,7.82,3.51,3.03,6.35,6.52,8.52,10.47,2.17,3.95,3.26,8.54,3.26,13.75,0,7.4-1.4,14.05-4.18,19.93-2.79,5.89-6.64,10.89-11.53,15.01-4.9,4.12-10.77,7.28-17.62,9.46-6.84,2.18-14.32,3.28-22.43,3.28Z"/>
            </svg>
        </div>
        <div class="col-11 col-md-12 col-lg-8 mx-auto mt-5 text-center text">
        <?php the_field("texto_cultura"); ?>
        </div>
        </div>
    </div>
</div>
    <?php
    if( have_rows('valores') ):
?>
<div class="container valores mb-5 py-5">
    <div class="row mb-5">
        <div class="col-12 mx-auto">
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
<?php
endif;
?>
<div class="container valores mb-5 py-5">
    <div class="row mb-5">
        <div class="col-12 mx-auto">
            <h2>Missão e Visão</h2>   
            <div class="row">
                <div class="col-12 col-md-6">
                    <h3>Missão</h3>
                    <p><?php the_field('mission'); ?></p>
                </div>
                <div class="col-12 col-md-6">
                    <h3>Visão</h3>
                    <p><?php the_field('vision'); ?></p>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
if( have_rows('numbers') ):
?>            
<div class="container-fluid orangeGradient numbers">
    <div class="container">
        <div class="row my-5 py-5">
            <div class="col-12 mx-auto">
                <div class="row">
                    <div class="col-12 col-md-3 col-lg-4">
                        <h2>ISM em números</h2>   
                    </div>
                    <div class="col-12 col-md-7 col-lg-6">
                        <?php
                            while( have_rows('numbers') ) : the_row();
                            $name = get_sub_field('numbers_item-name');
                            $desc = get_sub_field('numbers_item-desc');
                            $icon = get_sub_field('numbers_item-icon');    
                        ?>
                        <div class="row my-5">
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
<?php
endif;
?>

<div class="container map_operations">
    <div class="row">
        <div class="col-12 mx-auto">
            <div class="row">
                <div class="col-12 col-lg-6">
                    <img src="<?php the_field('map_operations'); ?>" alt="Operação ISM Brasil">
                </div>
                <div class="col-12 col-lg-6">
					<?php the_field('text_operations'); ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
if( have_rows('quality_badges') ):
    ?>
<div class="container">
    <div class="col-12 my-5 py-5 mx-auto">
        <h2>Qualidade comprovada</h2>   
        <div class="row justify-content-center mx-auto">
		
            <div class="col-12 col-md-6 col-lg-3 mx-auto mb-4">
                <div class="py-4">
                    <p class="text-left">
						<?php the_field('quality_desc'); ?>
					</p>
                </div>
            </div>
            <?php
                while( have_rows('quality_badges') ) : the_row();
                $name = get_sub_field('quality_badges-name');
                $desc = get_sub_field('quality_badges-desc');
                $badge = get_sub_field('quality_badges-img');
                $image_url = $badge['sizes']['quality-badge'];
            ?>
            <div class="col-12 col-md-6 col-lg-3 mx-auto mb-4">
                <div class="quality_badge p-4">
                    <p class="text-center"><img src="<?php echo $image_url; ?>" alt="<?php echo $name; ?>" class="mx-auto"></p>
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

<?php
endif;
get_footer();
?>