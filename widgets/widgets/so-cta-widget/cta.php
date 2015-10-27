<?php
/*
Widget Name: Call-to-action widget
Description: A simple call-to-action widget. You can do what ever you want with a call-to-action widget.
Author: Greg Priday
Author URI: http://siteorigin.com
*/

class SiteOrigin_Panels_Widget_Cta extends SiteOrigin_Widget  {

	function __construct() {

		parent::__construct(
			'sow-cta',
			__('Call to action block', 'siteorigin-widgets'),
			array(
				'description' => __('A simple call-to-action widget with massive power.', 'siteorigin-widgets'),
			),
			array(

			),
			array(

				'title' => array(
					'type' => 'text',
					'label' => __('Title', 'siteorigin-widgets'),
				),

				'sub_title' => array(
					'type' => 'text',
					'label' => __('Subtitle', 'siteorigin-widgets')
				),

				'title_color' => array(
					'type' => 'color',
					'label' => __( 'Choose a title color', 'simplz' ),
					'default' => '#fff',
				),
				'cta_icon' => array(
					'type' => 'icon',
					'label' => __( 'Select Icon', 'simplz' ),
				),
				'cta_icon_color' => array(
					'type' => 'color',
					'label' => __( 'Select Icon color', 'simplz' ),
				),
				'cta_icon_size' => array(
					'type' => 'number',
					'label' => __( 'Select Icon size', 'simplz' ),
				),
				
				'design' => array(
					'type' => 'section',
					'label' => __('Design', 'siteorigin-widgets'),
					'fields' => array(
						'background_color' => array(
							'type' => 'color',
							'label' => __('Background color', 'siteorigin-widgets'),
						),
						'border_color' => array(
							'type' => 'color',
							'label' => __('Border color', 'siteorigin-widgets'),
						),
						'button_align' => array(
							'type' => 'select',
							'label' => __( 'Button align', 'siteorigin-widgets' ),
							'default' => 'right',
							'options' => array(
								'left' => __( 'Left', 'siteorigin-widgets'),
								'right' => __( 'Right', 'siteorigin-widgets'),
							)
						)
					)
				),

				'button' => array(
					'type' => 'widget',
					'class' => 'SiteOrigin_Panels_Widget_Button',
					'label' => __('Button', 'siteorigin-widgets'),
				),

			),
			plugin_dir_path(__FILE__)
		);
	}

	/**
	 * Initialize the CTA widget
	 */
	function initialize(){
		if( ! class_exists('SiteOrigin_Panels_Widget_Button') ) {
			include plugin_dir_path( __FILE__ ) . '../so-button-widget/button.php';
			siteorigin_widget_register( 'button', realpath( plugin_dir_path( __FILE__ ) . '../so-button-widget/button.php' ) );
		}
		
		$this->register_frontend_styles(
			array(
				array(
					'sow-cta-main',
					siteorigin_widget_get_plugin_dir_url( 'cta' ) . 'css/style.css',
					array(),
					SOW_BUNDLE_VERSION
				)
			)
		);
		$this->register_frontend_scripts(
			array(
				array(
					'sow-cta-main',
					siteorigin_widget_get_plugin_dir_url( 'cta' ) . 'js/cta' . SOW_BUNDLE_JS_SUFFIX . '.js',
					array( 'jquery' ),
					SOW_BUNDLE_VERSION
				)
			)
		);
	}

	function get_template_name($instance) {
		return 'base';
	}

	function get_style_name($instance) {
		return 'basic';
	}

	function get_less_variables($instance) {
		if( empty( $instance ) ) return array();

		return array(
			'border_color' => $instance['design']['border_color'],
			'background_color' => $instance['design']['background_color'],
			'button_align' => $instance['design']['button_align'],
		);
	}

	function modify_child_widget_form($child_widget_form, $child_widget) {
		unset( $child_widget_form['design']['fields']['align'] );
		return $child_widget_form;
	}

}

siteorigin_widget_register('cta', __FILE__);