<?php

/**
* @file theme-customizer-class.php
* @brief Class d'administration/affichage (logo, couleurs, etc) - Voir Apparence > Personnaliser
*
* @author barrat-t
* @version 0.0.1
*/

class Tmpl_Theme_Customizer
{
	function __construct() {
		add_action('customize_register', array(&$this, 'theme_customize_register'));
	}

	function theme_customize_register($wp_customize)
	{
		$wp_customize->add_section(
			'layout_tmpl_social_section',
			array(
				'title'			=> __('Réseaux sociaux'),
				'capability'	=> 'edit_theme_options',
				'description'	=> __('Personnalisation réseaux sociaux'),
				'priority'       => 35,
			)
		);

		$wp_customize->add_setting(
			'layout_tmpl_options[facebook_display_url]',
			array(
				'type'       => 'option',
				'capability' => 'edit_theme_options',
				'default'       => '1', # Default checked
		));

		$wp_customize->add_control(
			'layout_tmpl_options[facebook_display_url]',
			array(
				'settings' => 'layout_tmpl_options[facebook_display_url]',
				'label'    => 'Afficher Facebook',
				'section'  => 'layout_tmpl_social_section', # Layout Section
				'type'     => 'checkbox', # Type of control: checkbox
		));

		$wp_customize->add_setting(
			'layout_tmpl_options[facebook_url]',
			array(
				'type'			=> 'option',
				'capability'	=> 'edit_theme_options',
				'default'		=> 'https://facebook.com/',
			)
		);

		$wp_customize->add_control(
			'layout_tmpl_options[facebook_url]',
			array(
				'label' => 'Page Facebook', # Label of text form
				'section' => 'layout_tmpl_social_section', # Layout Section
				'type' => 'text', # Type of control: text input
			)
		);

		$wp_customize->add_setting(
			'layout_tmpl_options[twitter_display_url]',
			array(
				'type'       => 'option',
				'capability' => 'edit_theme_options',
				'default'       => '1', # Default checked
		));

		$wp_customize->add_control(
			'layout_tmpl_options[twitter_display_url]',
			array(
				'settings' => 'layout_tmpl_options[twitter_display_url]',
				'label'    => 'Afficher Twitter',
				'section'  => 'layout_tmpl_social_section', # Layout Section
				'type'     => 'checkbox', # Type of control: checkbox
		));

		$wp_customize->add_setting(
			'layout_tmpl_options[twitter_url]',
			array(
				'type'			=> 'option',
				'capability'	=> 'edit_theme_options',
				'default'		=> 'https://twitter.com/',
			)
		);

		$wp_customize->add_control(
			'layout_tmpl_options[twitter_url]',
			array(
				'label' => 'Page Twitter', # Label of text form
				'section' => 'layout_tmpl_social_section', # Layout Section
				'type' => 'text', # Type of control: text input
			)
		);

		

		$wp_customize->add_section(
			'layout_tmpl_contact_section',
			array(
				'title'			=> __('Page - Contact'),
				'capability'	=> 'edit_theme_options',
				'description'	=> __("Lien vers la page contact"),
				'priority'       => 35,
			)
		);

		$wp_customize->add_setting(
			'layout_tmpl_options[contact_page]',
			array(
				'type'			=> 'option',
				'capability'	=> 'edit_theme_options',
			)
		);

		$wp_customize->add_control(
			'layout_tmpl_options_contact_page',
			array(
				'label' => 'Page contact', # Label of text form
				'section' => 'layout_tmpl_contact_section', # Layout Section
				'type' => 'dropdown-pages', # Type of control: text input
				'settings' => 'layout_tmpl_options[contact_page]',
			)
		);

    $wp_customize->add_section(
      'layout_tmpl_mentions_legales_section',
      array(
        'title'			=> __('Page - Mentions légales'),
        'capability'	=> 'edit_theme_options',
        'description'	=> __("Lien vers la page mentions légales"),
        'priority'       => 35,
      )
    );

    $wp_customize->add_setting(
      'layout_tmpl_options[mentions_legales]',
      array(
        'type'			=> 'option',
        'capability'	=> 'edit_theme_options',
      )
    );

    $wp_customize->add_control(
      'layout_tmpl_options_mentions_legales',
      array(
        'label' => 'Page mentions légales', # Label of text form
        'section' => 'layout_tmpl_mentions_legales_section', # Layout Section
        'type' => 'dropdown-pages', # Type of control: text input
        'settings' => 'layout_tmpl_options[mentions_legales]',
      )
    );
	}
}

$tmpl_theme_customizer = new Tmpl_Theme_Customizer();


/**
 * Returns the options array
 */
function tmpl_customizer_options($name, $default = false)
{
	$options = ( get_option( 'layout_tmpl_options' ) ) ? get_option( 'layout_tmpl_options' ) : null;
	// return the option if it exists
	if ( isset( $options[ $name ] ) ) {
		return apply_filters( 'layout_tmpl_options_$name', $options[ $name ] );
	}
	// return default if nothing else
	return apply_filters( 'layout_tmpl_options_$name', $default );
}
