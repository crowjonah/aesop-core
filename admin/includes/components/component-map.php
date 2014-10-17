<?php
/**
 	* Filters custom meta box class to add cusotm meta to map component
 	*
 	* @since    1.0.0
*/
class AesopMapComponentAdmin {

	public function __construct(){
		add_filter( 'cmb2_meta_boxes', array($this,'aesop_map_meta') );
	}

	function aesop_map_meta( array $meta_boxes ) {
		$meta_boxes[] = array(
			'id'		=> 'aesop_map_component_locations',
			'title' 	=> __('Map Component Locations', 'aesop-core'),
			'object_types' 	=> apply_filters('aesop_map_meta_location',array('post')),
			'fields' 	=> array(
				array(
					'id'			=> 'aesop_map_start',
					'name'			=> __('Starting Coordinates', 'aesop-core'),
					'type'			=> 'text',
				),
				array(
					'id'			=> 'aesop_map_component_zoom',
					'name'			=> __('Default Zoom Level', 'aesop-core'),
					'type'			=> 'text',
					'desc'			=> __('The larger the number, the more zoomed in the default will be. Limit is 20. Default is 12.','aesop-core')
				),
				array(
					'id' 			=> 'aesop_map_component_locations',
					'name' 			=> __('Map Markers', 'aesop-core'),
					'type' 			=> 'group',
					'options'     => array(
						'group_title'   => __( 'Marker {#}', 'aesop-core' ), // {#} gets replaced by row number
						'add_button'    => __( 'Add Another Marker', 'aesop-core' ),
						'remove_button' => __( 'Remove Marker', 'aesop-core' ),
						'sortable'      => true, // beta
					),
					'repeatable'     => true,
					'repeatable_max' => 20,
					'desc'			=> __('Assign latitude and longitude for each marker.', 'aesop-core'),
					'fields' 		=> array(
						array(
							'id' 	=> 'lat',
							'name' 	=> __('Latitude', 'aesop-core'),
							'type' 	=> 'text'
						),
						array(
							'id' 	=> 'long',
							'name' 	=> __('Longitude', 'aesop-core'),
							'type' 	=> 'text'
						),
						array(
							'id' 	=> 'content',
							'name' 	=> __('Marker Text', 'aesop-core'),
							'type' 	=> 'textarea_small'
						)
					)
				),
			)
		);

		return $meta_boxes;

	}

}
new AesopMapComponentAdmin;