<?php

/**
* @brief Permet d'administrer/afficher le Widget "Nous Rejoindre"
*
* @author barrat-t
* @version 0.0.1
*/

class Widget_Join_Us extends WP_Widget
{
  function __construct()
  {
    $widget_ops = array(
      'classname' => 'widget_join_us',
      'description' => 'Widget "nous rejoindre"'
    );

    parent::__construct( 'Widget_Join_Us', 'Nous Rejoindre', $widget_ops );
  }

  function widget($args, $instance)
	{
		extract($args);
    if ( ! empty( $instance['title'] ) ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
		}


		echo $before_widget;
?>
    <ul >
      <?php if($instance['display_utilisateur']):?>
      <li><a class="link-nostyle" href="<?php echo $instance['utilisateur']; ?>"><i class="fa fa-caret-right"></i><span>Utilisateur</span></i></a>
      </li>
    <?php endif ?>
    <?php if($instance['display_professionnel']):?>
      <li><a class="link-nostyle" href="<?php echo $instance['professionnel']; ?>"><i class="fa fa-caret-right"></i><span>Professionel</span></i></a>
      </li>
      <?php endif ?>
      <?php if($instance['display_benevole']):?>
      <li><a class="link-nostyle" href="<?php echo $instance['benevole']; ?>"><i class="fa fa-caret-right"></i><span>Bénévole</span></i></a>
      </li>
      <?php endif ?>
    </ul>

<?php
		echo $after_widget;
	}

  function form($instance)
  {
    $defaults = array(
      'title' => '',
      'display_utilisateur' => 0,
      'utilisateur' => '',
      'display_professionnel' => 0,
      'professionnel' => '',
      'display_benevole' => 0,
      'benevole' => ''
    );

    $instance = wp_parse_args((array) $instance, $defaults);

    $title = $instance['title'];
    $display_utilisateur = $instance['display_utilisateur'];
    $utilisateur = $instance['utilisateur'];
    $display_professionnel = $instance['display_professionnel'];
    $professionnel = $instance['professionnel'];
    $display_benevole = $instance['display_benevole'];
    $benevole = $instance['benevole'];

    ?>
    <p>Titre :
      <input class="widefat" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>">
    </p>
    <p>URL Page utilisateur :
      <input class="widefat" name="<?php echo $this->get_field_name('utilisateur'); ?>" type="text" value="<?php echo esc_attr($utilisateur); ?>">
    </p>
    <p><input type="checkbox" name="<?php echo $this->get_field_name('display_utilisateur'); ?>" value="1" <?php checked( esc_attr($display_utilisateur), 1, true ); ?>> Afficher le lien vers la page utilisateur</p>
    <p>URL Page professionnel :
      <input class="widefat" name="<?php echo $this->get_field_name('professionnel'); ?>" type="text" value="<?php echo esc_attr($professionnel); ?>">
    </p>
    <p><input type="checkbox" name="<?php echo $this->get_field_name('display_professionnel'); ?>" value="1" <?php checked( esc_attr($display_professionnel), 1, true ); ?>> Afficher le lien vers la page professionnel</p>
    <p>URL Page benevole :
      <input class="widefat" name="<?php echo $this->get_field_name('benevole'); ?>" type="text" value="<?php echo esc_attr($benevole); ?>">
    </p>
    <p><input type="checkbox" name="<?php echo $this->get_field_name('display_benevole'); ?>" value="1" <?php checked( esc_attr($display_benevole), 1, true ); ?>> Afficher le lien vers la page benevole</p>

    <?php
  }

  function update($new_instance, $old_instance)
  {
    $instance = $old_instance;

    $instance['title']	 = strip_tags( $new_instance['title'] );
    $instance['display_utilisateur']	 = strip_tags( $new_instance['display_utilisateur'] );
    $instance['display_professionnel']	 = strip_tags( $new_instance['display_professionnel'] );
    $instance['display_benevole']	 = strip_tags( $new_instance['display_benevole'] );
    $instance['utilisateur']	 = strip_tags( $new_instance['utilisateur'] );
    $instance['professionnel']	 = strip_tags( $new_instance['professionnel'] );
    $instance['benevole']	 = strip_tags( $new_instance['benevole'] );


    return $instance;
  }
}

function join_us_register_widgets() {
	register_widget('Widget_Join_Us');
}

add_action('widgets_init', 'join_us_register_widgets');
