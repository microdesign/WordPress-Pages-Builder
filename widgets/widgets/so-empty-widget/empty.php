<?php

/*
Widget Name: Headline widget
Description: A headline to headline all headlines.
Author: SiteOrigin
Author URI: http://siteorigin.com
*/

class SiteOrigin_Panels_Widget_Empty extends SiteOrigin_Widget {

	function __construct() {

		parent::__construct(
			'sow-empty',
			__( 'Add empty space between blocks', 'siteorigin-widgets' ),
			array(
				'description' => __( 'A Image widget.', 'siteorigin-widgets' )
			),
			array(),
			array(
				'height' => array(
					'type' => 'text',
					'label'  => __( 'Height of the empty space', 'siteorigin-widgets' ),
				),
			)
		);
	}

	/**
	 * Get the template for the headline widget
	 *
	 * @param $instance
	 *
	 * @return mixed|string
	 */
	function get_template_name( $instance ) {
		return 'base';
	}

}

siteorigin_widget_register('image', __FILE__);