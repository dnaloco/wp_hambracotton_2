<?php
namespace Blog\Widgets;

class CepeaResumoNoticias extends \WP_Widget {
	public function __construct() {
		parent::__construct(
			'CepeaResumoNoticias',
			__('Cepea - Resumo de Notícias', 'wpb_widget_domain'),
			array('description' => __('Sample widget base on WPBeginner Tutorial', 'wpb_widget_domain'),)
		);

		wp_register_script('jquery_marquee', '/wp-content/themes/angulartheme/vendor/jquery.marquee.min.js', array('jquery'));
		wp_enqueue_script('jquery_marquee');
	}

	// Creating widget front-end
	// This is where the action happens
	public function widget( $args, $instance ) {
		$title = apply_filters( 'widget_title', $instance['title'] );
		// before and after widget arguments are defined by themes
		echo $args['before_widget'];
		if ( ! empty( $title ) )
			echo $args['before_title'] . $title . $args['after_title'];

		// This is where you run the code and display the output
		$html = file_get_html("http://cepea.esalq.usp.br/algodao/");
		$widget = '';
        $widget .= '<div class="marquee">';
        foreach($html->find('marquee a') as $node):
          $widget .= "<a target='_blank' href='" . $node->href . "'>" . utf8_encode($node->plaintext) . "</a>";
          $widget .= "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
        endforeach;
        $widget .= '</div>';
		echo __( $widget, 'wpb_widget_domain' );
		echo $args['after_widget'];
	}
			
	// Widget Backend 
	public function form( $instance ) {
		if ( isset( $instance[ 'title' ] ) ) {
			$title = $instance[ 'title' ];
		}
		else {
			$title = __( 'New title', 'wpb_widget_domain' );
		}
		// Widget admin form
		?>
			<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
			</p>
		<?php 
	}
		
	// Updating widget replacing old instances with new
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		return $instance;
	}
}