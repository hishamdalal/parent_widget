<?phpdefined( 'ABSPATH' ) || exit; // Exit if accessed directlyclass test_widget2{	private $widget = null;	private $default = [];	
	//--------------------------------------------------------------------------------------------//	function __construct($widget_main) {		$this->widget = $widget_main;		$this->default['text'] = 'Welcome';	}	//--------------------------------------------------------------------------------------------//
	// front-end
	public function widget( $args, $instance ) {		echo $args['before_widget'];		$this->widget->view($args, $instance);		echo $args['after_widget'];		
	}	//--------------------------------------------------------------------------------------------//
	// Widget Backend 
	public function form( $instance ) {		$instance = array_merge((array) $instance, $this->default);		$text = esc_attr($instance['text']); //wp_strip_all_tags		?>
		<p>			<label for="<?=$this->widget->get_field_id( 'text' ); ?>"><?php _e('Text'); ?></label> 			<textarea class="widefat" id="<?=$this->widget->get_field_id( 'text' ); ?>" cols="10" rows="5" 				name="<?=$this->widget->get_field_name( 'text' ); ?>"><?=$text; ?></textarea>		</p>		<script>		jQuery('#<?=($this->widget->get_field_id('text' )); ?>').change(function(){			jQuery('.widget-control-actions input').click();		});		</script>
		<?php 
	}	//--------------------------------------------------------------------------------------------//
	// Updating widget replacing old instances with new
	public function update( $new_instance, $old_instance ) {		#$instance = $old_instance;		
		$instance['text'] 	= ( ! empty( $new_instance['text'] ) ) ? esc_attr( $new_instance['text'] ) : esc_attr( $old_instance['text'] );		return $instance;
	}	//--------------------------------------------------------------------------------------------//		public function view($args, $instance){		extract($instance);		echo '<h2>Text:</h2><pre>'.$text.'</pre><hr>';		#pre($instance, __method__);	}	//--------------------------------------------------------------------------------------------//		//--------------------------------------------------------------------------------------------//
} // Class ends here


?>