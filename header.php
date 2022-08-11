<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage ism-brasil
 * @since ism-brasil
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>

    <head>
        <title><?php echo wp_title(); ?></title>

        <meta charset="utf-8">

        <meta name="viewport" content="width=device-width, initial-scale=1.0" >
        <link rel="profile" href="https://gmpg.org/xfn/11" />
        <?php wp_head(); ?>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

        <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/style.css">
        <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon-ism.svg" type="image/x-icon" />
        <link rel="mask-icon" href="<?php echo get_template_directory_uri(); ?>/favicon-ism-mask.svg" color="#00A256">

        <script src="https://kit.fontawesome.com/c2c2eb9e10.js" crossorigin="anonymous"></script>

        <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
        <script type="application/ld+json">
        {
            "@context": "https://schema.org/",
            "@type": "WebSite",
            "url": "https://grupoism.com.br",
            "name": "Grupo ISM",
            "logo": "<?php echo get_template_directory_uri(); ?>/img/logo-ism-br.svg",
            "potentialAction": {
                "@type": "SearchAction",
                "target": "https://grupoism.com.br/q={search_term_string}",
                "query-input": "required name=search_term_string"
            },
            "areaServed": "Brasil"
        }
        </script>

    </head> 

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div class="veryTopBar orangeGradient"></div>
<div class="container">
        <div class="col-12 mx-auto" id="menuSecondary">
            <?php wp_nav_menu( array( 'theme_location' => 'top-bar' ) ); ?>
        </div>
</div>
<div class="container">
    <div class="row">
     <div class="col-11 col-md-12 mx-auto">
       <nav class="navbar navbar-expand-lg navbar-light">

          <a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" data-link="header-ism"><img src="<?php echo get_template_directory_uri(); ?>/img/logo-ism-br.svg" height="53" alt="Logo do Grupo ISM Brasil" /></a>

          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menuGlobal" aria-controls="menuGlobal" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
            <?php wp_nav_menu( 
                array( 
                    'theme_location' => 'principal', 
                    'container_class' => 'collapse navbar-collapse justify-content-end', 
                    'container_id' => 'menuGlobal', 
                    'items_wrap'     => '<ul class="navbar-nav">%3$s</ul>' 
                    ) 
                ); 
            ?>
        </nav>
        </div>
    </div>
</div>

<!-- Swiper JS -->
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>