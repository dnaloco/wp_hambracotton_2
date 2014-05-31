<?php
namespace Blog\Widgets;

class IndicadoresEconomicos extends \WP_Widget {
	public function __construct() {
		parent::__construct(
			'IndicadoresEconomicos',
			__('Indicadores Econômicos', 'wpb_widget_domain'),
			array('description' => __('Sample widget base on WPBeginner Tutorial', 'wpb_widget_domain'),)
		);

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
		echo <<<IFRAME
		<iframe src="http://www.listabrasil.com/widget/currency/currency-display.aspx?bgcolor=69613F" frameborder="0" height="119" style="width:100%;" scrolling="no"></iframe>
		<iframe name="InlineFrame1" id="InlineFrame1" style="width: 98%; margin: auto;" height="410" src="http://www.acervoleis.com.br/export/quadroIndFin.asp" frameborder="1"></iframe>
IFRAME;

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