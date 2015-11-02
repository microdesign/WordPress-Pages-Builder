<?php

class SiteOrigin_Panels_Widget_Testimonial extends SiteOrigin_Widget  {
	function __construct() {
		parent::__construct(
			'sow-testimonial',
			__('Testimonial', 'siteorigin-panels'),
			array(
				'description' => __('Displays a bullet list of points', 'siteorigin-panels'),
				'default_style' => 'simple',
			),
			array(),
			array(
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
			plugin_dir_path(__FILE__).'../'
		);
	}

	function get_template_name( $instance ) {
		return 'simple';
	}

	function get_template_variables( $instance, $args ) {
		return $instance;
	}
}

siteorigin_widget_register('testimonial', __FILE__);