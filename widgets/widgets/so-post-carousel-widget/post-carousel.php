<?php
/*
Widget Name: Post carousel widget
Description: Gives you a widget to display your posts as a carousel.
Author: Greg Priday
Author URI: http://siteorigin.com
*/

/**
 * Add the carousel image sizes
 */
function sow_carousel_register_image_sizes(){
	add_image_size('sow-carousel-default', 272, 182, true);
}
add_action('init', 'sow_carousel_register_image_sizes');

class SiteOrigin_Panels_Widget_Post_Carousel extends SiteOrigin_Widget {
	function __construct() {
		parent::__construct(
			'sow-post-carousel',
			__('Post Carousel', 'siteorigin-widgets'),
			array(
				'description' => __('Display your posts as a carousel.', 'siteorigin-widgets'),
			),
			array(

			),
			array(
				'title' => array(
					'type' => 'text',
					'label' => __('Title', 'siteorigin-widgets'),
				),
				'title_size' => array(
					'type' => 'number',
					'default' => '30',
					'label' => __('Title Size', 'siteorigin-widgets'),
				),
				'title_color' => array(
					'type' => 'color',
					'label' => __('Title Color', 'siteorigin-widgets'),
					'default' => '#fff',
				),
				
				'more_details' => array(
					'type' => 'text',
					'label' => __('Button text', 'siteorigin-widgets'),
				),
				'more_details_color' => array(
					'type' => 'color',
					'label' => __('Button Color', 'siteorigin-widgets'),
					'default' => '#fff',
				),
				'per_page' => array(
					'type' => 'number',
					'default' => 3,
					'label' => __('Posts per page', 'siteorigin-widgets'),
				),
				'style' => array(
					'type' => 'select',
					'default' => 'base',
					'options' => array(
						'base' => __( 'Default Slider', 'siteorigin-widgets' ),
						'grid' => __( 'Grid', 'siteorigin-widgets' ),
						'isotope' => __( 'Isotope with category filters', 'siteorigin-widgets' ),
					),
					'label' => __('Post design style', 'siteorigin-widgets'),
				),
				'posts' => array(
					'type' => 'posts',
					'label' => __('Posts query', 'siteorigin-widgets'),
				),
			),
			plugin_dir_path(__FILE__).'../'
		);
	}

	function initialize() {
		$this->register_frontend_styles(
			array(
				array(
					'sow-carousel-basic',
					siteorigin_widget_get_plugin_dir_url( 'post-carousel' ) . 'css/style.css',
					array(),
					SOW_BUNDLE_VERSION
				)
			)
		);
	}

	function get_template_name($instance){
		return 'base';
	}

	function get_style_name($instance){
		return false;
	}
}

siteorigin_widget_register('post-carousel', __FILE__);