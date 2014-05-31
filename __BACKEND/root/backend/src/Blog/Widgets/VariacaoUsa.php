<?php
namespace Blog\Widgets;

class VariacaoUsa extends \WP_Widget {
	public function __construct() {
		parent::__construct(
			'VariacaoUsa',
			__('Algodão Variação Mês - USA', 'wpb_widget_domain'),
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
		<a target="_blank" href='http://www.indexmundi.com/commodities/?commodity=cotton'><img width="100%" alt='Cotton - Daily Price - Commodity Prices - Price Charts, Data, and News - IndexMundi' src='http://www.indexmundi.com/commodities/image.aspx?commodity=cotton' style='border: solid 1px #rgb(0.6,0.6,0.6);' title='Click to play with this data at IndexMundi' /></a>
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