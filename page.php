<script>
    var dataLayer = [];
    dataLayer.push({
    'contentGroup': 'Page',
    'contentLevel': 'Single'
    });
</script>
<?php
get_header();
?>
<div class="container d-none">
    <div class="row">
        <div class="col-12 greenGradient mb-5 mt-3 title">
            <div class="col-11 col-md-10 mx-auto">
                <h1><?php echo the_title(); ?></h1>
            </div>
        </div>
    </div>
</div>

<div class="greenGradient mx-auto titleBar mt-3 mb-4">
    <div class="container">
        <div class="row">
            <div class="col-11 col-md-12 mx-auto">
                <h1><?php echo the_title(); ?></h1>
            </div>
        </div>
    </div>
</div>


<div class="container" id="conteudo">
    <div class="row">
        <div class="col-11 col-md-12 mx-auto">
            <article>
                <?php the_content(); ?>
            </article>
        </div>
    </div>
</div>
            
<?php
get_footer();
?>