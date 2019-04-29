<?php

/**
* @brief Permet d'administrer/afficher le Widget de carte
*
* @author barrat-t
* @version 0.0.1
*/

class Widget_Map extends WP_Widget
{
  function __construct()
  {
    $widget_ops = array(
      'classname' => 'widget_map',
      'description' => "Widget de cartographie"
    );

    parent::__construct( 'Widget_Map', 'Carte', $widget_ops );
  }

  function widget($args, $instance)
	{
		extract($args);

		echo $before_widget;

		get_template_part('template-parts/widget-map');

		echo $after_widget;
	}

  function form($instance)
  {
    $defaults = array(
      'title' => ''
    );

    $instance = wp_parse_args((array) $instance, $defaults);

    $title = $instance['title'];

    ?>
    <p>Titre :
      <input class="widefat" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>">
    </p>

    <?php
  }

  function update($new_instance, $old_instance)
  {
    $instance = $old_instance;

    $instance['title']	 = strip_tags( $new_instance['title'] );


    return $instance;
  }
}
function map_register_widgets() {
	register_widget('Widget_Map');
}

add_action('widgets_init', 'map_register_widgets');
