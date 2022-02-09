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
                <div class="col-4"><p><?php the_field('intro') ?></p></div>
                <div class="col-8"><?php the_post_thumbnail('single-news'); ?></div>
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
    
        </div>
    </div>
</div>
            
<?php
get_footer();
?>