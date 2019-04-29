<?php

/**
* @file css-class.php
* @brief Class permettant de gérer les CSS en FO
*
* @author barrat-t
* @version 0.0.1
*/

class Tmpl_Css
{
	var $use_min_files;
	var $min_ext = '';

	function __construct()
	{
		$this->use_min_files = get_option( 'use_min_files_css_js_options' );

		if( isset( $this->use_min_files ) && !empty( $this->use_min_files ) )
		{
			$this->min_ext = '.min';
		}

		if( !is_admin() ) {
			add_action( 'wp_enqueue_scripts', array( &$this, 'register_theme_css_styles' ) );
		}
	}

	function register_theme_css_styles()
	{
		wp_register_style( 'florain', get_template_directory_uri() . '/css/style' . $this->min_ext . '.css', array(), TMPL_VERSION, 'all');

		wp_register_style( 'florain-print', get_template_directory_uri() . '/css/print' . $this->min_ext . '.css', array( 'florain', 'genericons' ), TMPL_VERSION, 'print');

		if( is_single() || is_category() || is_tag() || is_tax( 'region-category' ) || is_tax( 'entite-category' ) )
		{
			wp_register_style( 'publication', get_template_directory_uri() . '/css/style-publication' . $this->min_ext . '.css', array( 'florain' ), TMPL_VERSION, 'all');
			wp_enqueue_style( 'publication' );
		}

		if(( is_search() || is_page() || is_404() || is_tag()) && !is_front_page() )
		{
			wp_register_style( 'page', get_template_directory_uri() . '/css/style-page' . $this->min_ext . '.css', array( 'florain' ), TMPL_VERSION, 'all');

			wp_enqueue_style( 'page' );
		}

		if( is_search() )
		{
			wp_register_style( 'search', get_template_directory_uri() . '/css/style-search' . $this->min_ext . '.css', array( 'florain' ), TMPL_VERSION, 'all');

			wp_enqueue_style( 'search' );
		}

		wp_enqueue_style( 'florain' , time() );
		wp_enqueue_style( 'florain-print' , time() );
		// NOTA BENE : le , time() permet de contourner le problème de mise en cache par wordpress des styles lorsqu'on travaille dessus. Voir ce lien : https://www.green-box.co.uk/3-ways-easily-stop-wordpress-caching-styles/ (voir la 3eme méthode)
	}
}

$tmpl_css = new Tmpl_Css();
