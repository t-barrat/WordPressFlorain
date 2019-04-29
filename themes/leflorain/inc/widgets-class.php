<?php

/**
* @file widgets-class.php
* @brief Class permettant l'initialisation des zones de widgets
*
* @author barrat-t
* @version 0.0.1
*/



class Tmpl_florain_Widgets_Init
{
	function __construct() {
		add_action( 'widgets_init', array($this, 'default_widgets_init' ) );
	}

	function default_widgets_init() {
		register_sidebar( array(
			'name'          => esc_html__( 'Sidebar Défaut', 'florain' ),
			'id'            => 'sidebar-1',
			'description'   => 'Sidebar par défaut du site',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		));

	}
}

$tmpl_florain_widgets_init = new Tmpl_florain_Widgets_Init();
