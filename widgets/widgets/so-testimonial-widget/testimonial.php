<?php

class SiteOrigin_Panels_Widget_Testimonial extends SiteOrigin_Widget  {
	function __construct() {
		parent::__construct(
			'sow-testimonial',
			__('Testimonials', 'siteorigin-panels'),
			array(
				'description' => __('Displays a bullet list of points', 'siteorigin-panels'),
				'default_style' => 'simple',
			),
			array(),
			array(
				'testimonials' => array(
					'type' => 'repeater',
					'label' => __('Testimonials', 'siteorigin-widgets'),
					'item_name' => __('Testimonial', 'siteorigin-widgets'),
					'item_label' => array(
						'selector' => "[id*='testimonial-title']",
						'update_event' => 'change',
						'value_method' => 'val'
					),
					'fields' => array(
						'name' => array(
							'type' => 'text',
							'label' => __('Name', 'siteorigin-panels'),
						),
						'location' => array(
							'type' => 'text',
							'label' => __('Location', 'siteorigin-panels'),
						),
						'image' => array(
							'type' => 'media',
							'label' => __('Image', 'siteorigin-widgets'),
						),
						'text' => array(
							'type' => 'textarea',
							'label' => __('Text', 'siteorigin-panels'),
						),
						'url' => array(
							'type' => 'text',
							'label' => __('URL', 'siteorigin-panels'),
						),
						'new_window' => array(
							'type' => 'checkbox',
							'label' => __('Open In New Window', 'siteorigin-panels'),
						),
					),
				),
				'per_row' => array(
					'type' => 'number',
					'label' => __('Testimonials per row', 'siteorigin-widgets'),
					'default' => 3,
				),
				'slider' => array(
					'type' => 'checkbox',
					'label' => __('Display in slider', 'siteorigin-widgets'),
					'default' => true,
				),
				
			),
			plugin_dir_path(__FILE__).'../'
		);
	}

	function initialize() {
		$this->register_frontend_scripts(
			array(
				array(
					'siteorigin-testimonial',
					siteorigin_widget_get_plugin_dir_url( 'testimonial' ) . 'js/testimonial' . SOW_BUNDLE_JS_SUFFIX . '.js',
					array( 'jquery' )
				)
			)
		);
	}

	function get_style_name($instance){
		return ($instance['slider'] == true) ? 'slider' : 'simple';
	}

	function get_template_name( $instance ) {
		return ($instance['slider'] == true) ? 'slider' : 'simple';
	}

	function get_template_variables( $instance, $args ) {
		return $instance;
	}
}

siteorigin_widget_register('testimonial', __FILE__);