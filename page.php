<script>
    var dataLayer = [];
    dataLayer.push({
    'content_type': 'Page'
  });
</script>
<?php
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

<div class="container" id="conteudo">
    <div class="row">
        <div class="col-11 col-md-10 mx-auto">
            <article>
                <?php the_content(); ?>
            </article>
        </div>
    </div>
</div>
            
<?php
get_footer();
?>