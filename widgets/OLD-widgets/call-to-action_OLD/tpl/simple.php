<!--<h2 class="title">--><?php //echo esc_html($instance['title']) ?><!--</h2>-->
<!--<h5 class="subtitle">--><?php //echo esc_html($instance['subtitle']) ?><!--</h5>-->
<?php //$this->sub_widget('button', array('text' => $instance['button_text'], 'url' => $instance['button_url'], 'new_window' => $instance['button_new_window'], 'origin_style' => $instance['origin_style_button'])) ?>



<?php
$panel_info = $instance['panels_info']['style'];

//print_r($instance);die;

?>
<div class="sow-cta-base <?php if($panel_info['background_display'] == 'parallax'): ?>simplz-parallax<?php endif; ?>" >

	<div class="sow-cta-wrapper">

		<?php
		$icon_styles = array();
		if(!empty($instance['cta_icon_size'])) $icon_styles[] = 'font-size: '.intval($instance['cta_icon_size']).'px';
		if(!empty($instance['cta_icon_color'])) $icon_styles[] = 'color: '.$instance['cta_icon_color'];
		?>
		<div class="cta-icon">
			<?php echo siteorigin_widget_get_icon( $instance['cta_icon'], $icon_styles ); ?>
		</div>

		<div class="sow-cta-text">
			<h1 style="color:<?php echo wp_kses_post( $instance['title_color'] ) ?>">
				<?php echo wp_kses_post( $instance['title'] ) ?>
			</h1>
			<div class="cta-description">
				<?php echo wp_kses_post( $instance['subtitle'] ) ?>
			</div>
		</div>

		<div class="center-block" style="width: 251px;">
			<?php $this->sub_widget('SiteOrigin_Widget_Button_Widget', $args, $instance['button']) ?>
		</div>
	</div>
</div>