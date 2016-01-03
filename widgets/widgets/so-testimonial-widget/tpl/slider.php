<?php foreach($instance['testimonials'] as $i => $testimonial): ?>

	<?php if( $i % $instance['per_row'] == 0 && $i != 0 ) : ?>
		<div class="sow-testimonials-clear"></div>
	<?php endif; ?>

	<div class="sow-testimonial-wrapper" style="width: <?php echo round( 100 / $instance['per_row'], 3 ) ?>%">
		<div class="testimonial-image-wrapper">
			<?php echo wp_get_attachment_image($testimonial['image'], 'thumbnail', false, array('class' => 'wow fadeIn')) ?>
		</div>

		<div class="text">
			<?php echo wpautop(wp_kses_post($testimonial['text'])) ?>
			<h5 class="testimonial-name">
				<?php if(!empty($testimonial['url'])) : ?>
				<a href="<?php echo esc_url($testimonial['url']) ?>">
					<?php endif ?>
					<?php echo esc_html($testimonial['name']) ?>
					<?php if(!empty($testimonial['url'])) : ?>
				</a>
			<?php endif ?>
			</h5>
			<small class="testimonial-location"><?php echo esc_html($testimonial['location']) ?></small>
		</div>
	</div>
<?php endforeach; ?>