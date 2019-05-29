<?php
// This function enqueues the Normalize.css for use. The first parameter is a name for the stylesheet, the second is the URL. Here we
// use an online version of the css file.
function add_normalize_CSS() {
    wp_enqueue_style( 'normalize-styles', "https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.0/normalize.min.css");
}
// Retourner la premère image d'un post
function catch_that_image() {
global $post, $posts;
ob_start();
ob_end_clean();
if(preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches)) {
        return $matches [1] [0];
    } else {
        return null;
    }
}
// Register a new sidebar simply named 'sidebar'
function add_widget_Support() {
                register_sidebar( array(
                                'name'          => 'Sidebar',
                                'id'            => 'sidebar',
                                'before_widget' => '<div>',
                                'after_widget'  => '</div>',
                                'before_title'  => '<h2>',
                                'after_title'   => '</h2>',
                ) );
                register_sidebar( array(
                                'name'          => 'Sidebar',
                                'id'            => 'sidebar',
                                'before_widget' => '<div>',
                                'after_widget'  => '</div>',
                                'before_title'  => '<h2>',
                                'after_title'   => '</h2>',
                ) );
}
// Hook the widget initiation and run our function
add_action( 'widgets_init', 'add_Widget_Support' );

// Register a new navigation menu
function add_Main_Nav() {
  register_nav_menu('header-menu',__( 'Header Menu' ));
}
// Hook to the init action hook, run our navigation menu function
add_action( 'init', 'add_Main_Nav' );

/**
 * Ajout d'un élément avant le menu
 */
add_action( 'wp_nav_menu', 'responsive_menu_button', 9, 2 );
function responsive_menu_button( $menu, $args ) {
	// S'il s'agit du menu principal, j'ajoute mon bouton devant
	if ( 'header-menu' == $args->theme_location ) {
		$menu = '<label for="show-menu" class="show-menu">Menu</label><input type="checkbox" id="show-menu" role="button">' . $menu;
	}
	return $menu;
}

/*
* Constante globale du template
*/
define( 'TMPL_VERSION', '0.0.1' ); // forcer le rafraichissement des caches navigateurs + proxys + CDN

require_once( 'inc/css-class.php' ); // Appel dynamique des CSS
require_once( 'inc/theme-customizer-class.php' ); // Options de thème
require_once( 'inc/widgets-class.php' ); // Zones de widgets
require_once( 'inc/widget-search-class.php' ); // Widget de recherche
require_once( 'inc/widget-join-us-class.php' ); // Widget "nous rejoindre"
require_once( 'inc/widget-don-class.php' ); // Widget "Faire un don"
require_once( 'inc/widget-map-class.php' ); // Widget de cartographie

/*
SHORTCODES personnalisés
*/
function shortcodeperso_1() {echo ' Texte à écrire ';}
add_shortcode('short1', 'shortcodeperso_1');