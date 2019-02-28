<?phpdefined( 'ABSPATH' ) || exit; // Exit if accessed directlyclass test_widget2{	private $widget = null;	
	//--------------------------------------------------------------------------------------------//	function __construct($widget_main) {		$this->widget = $widget_main;		$this->default['text'] = 'Welcome';	}	//--------------------------------------------------------------------------------------------//
	// front-end
	public function widget( $args, $instance ) {			echo $args['before_widget'];				$this->widget->view($args, $instance);				echo $args['after_widget'];		
	}	//--------------------------------------------------------------------------------------------//
	// Widget Backend 
	public function form( $instance ) {				$instance = wp_parse_args((array) $instance, $this->default);		$text = wp_strip_all_tags($instance['text']);		  				?>
		<p>			<label for="<?=$this->widget->get_field_id( 'text' ); ?>"><?php _e('Text'); ?></label> 			<textarea class="widefat" id="<?=$this->widget->get_field_id( 'text' ); ?>" cols="10" rows="5" 				name="<?=$this->widget->get_field_name( 'text' ); ?>"><?=esc_attr( $text ); ?></textarea>		</p>		<script>		jQuery('#<?=($this->widget->get_field_id('text' )); ?>').change(function(){			jQuery('.widget-control-actions input').click();		});		</script>
		<?php 
	}	//--------------------------------------------------------------------------------------------//
	// Updating widget replacing old instances with new
	public function update( $new_instance, $old_instance ) {				#$instance = $old_instance;				
		$instance['text'] 	= ( ! empty( $new_instance['text'] ) ) ? wp_strip_all_tags( $new_instance['text'] ) : wp_strip_all_tags( @$old_instance['text'] );				return $instance;
	}	//--------------------------------------------------------------------------------------------//		public function view($args, $instance){		extract($instance['sub']);		echo '<h2>Text:</h2><pre>'.$text.'</pre><hr>';		#pre($instance, __method__);	}	//--------------------------------------------------------------------------------------------//		//--------------------------------------------------------------------------------------------//
} // Class ends here


?>