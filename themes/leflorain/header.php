<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package florain
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <title>
      <?php bloginfo('name'); ?> &raquo;
      <?php is_front_page() ? bloginfo('description') : wp_title(''); ?>
  </title>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Chrome, Firefox OS and Opera -->
	<meta name="theme-color" content="#d7da23">
	<!-- Windows Phone -->
	<meta name="msapplication-navbutton-color" content="#d7da23">
	<!-- iOS Safari -->
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">

	<!-- Custom Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

  <!-- Mapbox -->
  <script src='https://api.tiles.mapbox.com/mapbox-gl-js/v0.52.0/mapbox-gl.js'></script>
  <link href='https://api.tiles.mapbox.com/mapbox-gl-js/v0.52.0/mapbox-gl.css' rel='stylesheet' />


	<?php wp_head(); ?>

</head>


<body <?php body_class(); ?>>
  <div id="page-area">
    <div id="main-area">
    <header>



        <div id="header" class="header">

            <div class="left-header">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logo"><img src="http://localhost/le-florain/wp-content/themes/leflorain/img/logo-monnaie-disquevert.png" alt="Le Florain" title="" /></a>
                <h1 class="header-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                        <?php bloginfo('name'); ?></a></h1>
            </div>

            <?php wp_nav_menu( array( 'header-menu' => 'header-menu' ) ); ?>




        </div>
    </header>
    <script>
window.onscroll = function() {myFunction()};

var header = document.getElementById("header");
var sticky = header.offsetTop;

function myFunction() {
  if (window.pageYOffset > sticky) {
    header.classList.add("sticky");
  } else {
    header.classList.remove("sticky");
  }
}
</script>
