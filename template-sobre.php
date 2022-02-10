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
        <article id="conteudo">
            <div class="col-11 col-md-8 mx-auto"><?php the_content(); ?></div>
        </article>
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
            
<div class="container valores">
    <div class="row my-5">
        <div class="col-11 col-md-12 mx-auto">
            <h2>Nossos valores</h2>   
            <div class="col-12 col-md-8 mx-auto">
                <?php

                // Check rows exists.
                if( have_rows('valores') ):

                // Loop through rows.
                while( have_rows('valores') ) : the_row();

                    // Load sub field value.
                    $name = get_sub_field('valor_name');
                    $desc = get_sub_field('valor_desc');
                    // Do something...
                    ?>
                    <div class="valor">
                        <h3><?php echo $name; ?></h3>
                        <p><?php echo $desc; ?></p>
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
        </div>
    </div>
</div>
            
<div class="container-fluid orangeGradient numbers">
    <div class="container">
        <div class="row my-5 py-5">
            <div class="col-11 col-md-12 mx-auto">
                <h2>ISM em números</h2>   
                        <?php

                        // Check rows exists.
                        if( have_rows('numbers') ):

                        // Loop through rows.
                        while( have_rows('numbers') ) : the_row();

                            // Load sub field value.
                            $name = get_sub_field('numbers_item-name');
                            $desc = get_sub_field('numbers_item-desc');
                            // Do something...
                            ?>
                            <div class="number">
                                <h3><?php echo $name; ?></h3>
                                <?php echo $desc; ?>
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
        </div>
    </div>
</div>
            
<div class="container">
    <div class="col-11 col-md-12">
        <div class="row justify-content-center my-5 mx-auto">
            <h2>Qualidade comprovada</h2>   
                <?php
                // Check rows exists.
                if( have_rows('quality_badges') ):
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
                endif;
            ?>
        </div>
    </div>
</div>


<script>
	const swiper = new Swiper('.swiper-timeline', {
      slidesPerView: 1,
      slidesPerGroup: 1,
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