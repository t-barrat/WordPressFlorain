<?php

/**
* @brief Permet d'administrer/afficher le Widget "Faire un don"
*
* @author barrat-t
* @version 0.0.1
*/

class Widget_Don extends WP_Widget
{
  function __construct()
  {
    $widget_ops = array(
      'classname' => 'widget_don',
      'description' => 'Widget "Faire un don"'
    );

    parent::__construct( 'Widget_Don', 'Faire un don', $widget_ops );
  }

  function widget($args, $instance)
	{

		extract($args);
    echo $before_widget;
    if($instance['url_don']) { ?>
      <a class="link-nostyle" href="<?php echo $instance['url_don']; ?>">
      <?php
      if ( ! empty( $instance['title'] ) ) {
  			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
  		}?>
    </a>
      <?php
    }

		echo $after_widget;
	}

  function form($instance)
  {
    $defaults = array(
      'title' => '',
      'url_don' => ''
    );

    $instance = wp_parse_args((array) $instance, $defaults);

    $title = $instance['title'];
    $url_don = $instance['url_don'];


    ?>
    <p>Titre :
      <input class="widefat" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>">
    </p>
    <p>URL Page de don :
      <input class="widefat" name="<?php echo $this->get_field_name('url_don'); ?>" type="text" value="<?php echo esc_attr($url_don); ?>">
    </p>

    <?php
  }

  function update($new_instance, $old_instance)
  {
    $instance = $old_instance;

    $instance['title']	 = strip_tags( $new_instance['title'] );
    $instance['url_don']	 = strip_tags( $new_instance['url_don'] );



    return $instance;
  }
}

function don_register_widgets() {
	register_widget('Widget_Don');
}

add_action('widgets_init', 'don_register_widgets');
