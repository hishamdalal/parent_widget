<?phpdefined( 'ABSPATH' ) || exit; // Exit if accessed directlyclass test_widget1{	private $widget = null;	
	//--------------------------------------------------------------------------------------------//	function __construct($widget_main) {		$this->widget = $widget_main;				$this->default['from'] 	= 0;		$this->default['to'] 	= 10;			}	//--------------------------------------------------------------------------------------------//
	// front-end
	public function widget( $args, $instance ) {				echo $args['before_widget'];				$this->widget->view($args, $instance);				echo $args['after_widget'];		
	}	//--------------------------------------------------------------------------------------------//
	// Widget Backend 
	public function form( $instance ) {					$instance = wp_parse_args((array) $instance, $this->default);				$from 	= intval($instance['from']);		$to 	= intval($instance['to']);				?>
		<p>
			<label for="<?=$this->widget->get_field_id( 'from' )?>"><?php _e('From')?></label> 			<input class="widefat" id="<?=$this->widget->get_field_id( 'from' )?>" 				name="<?=$this->widget->get_field_name( 'from' )?>" type="number" min="0" max="100" step="1"				value="<?=esc_attr( $from )?>" />
		</p>		<p>
			<label for="<?=$this->widget->get_field_id( 'to' )?>"><?php _e('To')?></label> 			<input class="widefat" id="<?=$this->widget->get_field_id( 'to' )?>" 				name="<?=$this->widget->get_field_name( 'to' )?>" type="number" min="0" max="100" step="1"				value="<?=esc_attr( $to )?>" />
		</p>		<script>		jQuery('#<?=$this->widget->get_field_id('from' )?>,#<?=$this->widget->get_field_id('to' )?>').change(function(){			jQuery('.widget-control-actions input').click();		});		</script>
		<?php 
	}	//--------------------------------------------------------------------------------------------//
	// Updating widget replacing old instances with new
	public function update( $new_instance, $old_instance ) {		#$instance = $old_instance;				
		$instance['from'] 	= ( ! empty( $new_instance['from'] ) ) ? intval( $new_instance['from'] ) : intval( @$old_instance['from'] );		$instance['to'] 	= ( ! empty( $new_instance['to'] ) ) ? intval( $new_instance['to'] ) : intval( @$old_instance['to'] );				#$this->widget->update( $instance, $old_instance );
		return $instance;
	}	//--------------------------------------------------------------------------------------------//	public function view($args, $instance){		extract($instance['sub']);		echo '<h2>Number: from:'.$from.', To: '.$to.'</h2>';		#pre($instance, __method__);	}	//--------------------------------------------------------------------------------------------//} // Class ends here


?>