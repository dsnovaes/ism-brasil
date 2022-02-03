
<?php

    add_theme_support( 'menus' );
    add_theme_support( 'post-thumbnails' );
    set_post_thumbnail_size( 252, 140, true );
    add_image_size( 'archive-news', 252, 140 );
    add_image_size( 'home-news', 252, 178 );
    add_action( 'widgets_init', 'my_register_sidebars' );

function my_register_sidebars() {
    /* Register the 'primary' sidebar. */
    register_sidebar(
        array(
            'id'            => 'primary',
            'name'          => __( 'Primary Sidebar' ),
            'description'   => __( 'A short description of the sidebar.' ),
            'before_widget' => '<div id="%1$s" class="p-3 widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        )
    );
    /* Repeat register_sidebar() code for additional sidebars. */
}

function register_my_menus() {
    register_nav_menus(
        array(
            'top-bar' => __( 'Top Bar' ),
            'footer' => __( 'Rodapé' ),
            'principal' => __( 'Principal' ),
            'social' => __( 'Redes Sociais' ),
            '404page' => __( 'Página 404' )
            )
        );
    }
add_action( 'init', 'register_my_menus' );

function excerpt($limit) {
  $excerpt = explode(' ', get_the_excerpt(), $limit);
  if (count($excerpt)>=$limit) {
    array_pop($excerpt);
    $excerpt = implode(" ",$excerpt).'...';
  } else {
    $excerpt = implode(" ",$excerpt);
  } 
  $excerpt = preg_replace('`[[^]]*]`','',$excerpt);
  return $excerpt;
}

add_filter( 'nav_menu_link_attributes', function ( $atts, $item, $args ) {
    if ( 'datalink-menuglobal' === $item->classes[0] ) {
        $atts['data-link'] = 'menuglobal';
    } elseif ( 'datalink-footer' === $item->classes[0] ) {
        $atts['data-link'] = 'footer-menu';
    } elseif ( 'datalink-topbar' === $item->classes[0] ) {
        $atts['data-link'] = 'topbar';
    }  elseif ( 'datalink-social' === $item->classes[0] ) {
        $atts['data-link'] = 'footer-social';
    }   elseif ( 'datalink-404' === $item->classes[0] ) {
        $atts['data-link'] = '404-links';
    } 

    return $atts;
}, 10, 3 );

function my_acf_init() {
    acf_update_setting('google_api_key', 'AIzaSyC_3rfHwHu4mKZBJ7N3esIAsn43JI0OJPM');
}
add_action('acf/init', 'my_acf_init');


add_action( 'admin_init', 'my_remove_menu_pages' );
function my_remove_menu_pages() {


  global $user_ID;

  if ( $user_ID != 1 ) { //your user id

   remove_menu_page('edit.php'); // Posts
   remove_menu_page('upload.php'); // Media
   remove_menu_page('link-manager.php'); // Links
   remove_menu_page('edit-comments.php'); // Comments
   remove_menu_page('plugins.php'); // Plugins
   remove_menu_page('themes.php'); // Appearance
   remove_menu_page('users.php'); // Users
   remove_menu_page('tools.php'); // Tools
   remove_menu_page('options-general.php'); // Settings
  }
}


?>