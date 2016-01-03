
<div class="sow-testimonial-left" style="float: left;max-width: 50%;">
<?php foreach($instance['testimonials'] as $i => $testimonial): ?>
	<?php if( $i % $instance['per_row'] == 0 && $i != 0 ) : ?>
		<div class="sow-testimonials-clear"></div>
	<?php endif; ?>
	<div class="sow-testimonial-wrapper" >
		<div class="testimonial-image-wrapper"  data-id="<?php echo $i?>">
			
			<div class="cover" style="<?php if ($i == 0):?>display: none<?php endif;?>"></div>
			
			<?php echo wp_get_attachment_image($testimonial['image'], 'thumbnail', false, array('class' => 'wow fadeIn')) ?>
		</div>	
	</div>
<?php endforeach; ?>
</div>

<div class="sow-testimonial-right" style="float: left;max-width: 50%;">
<?php foreach($instance['testimonials'] as $i => $testimonial): ?>
		<div class="text" style="<?php if ($i != 0):?>display: none<?php endif;?>" data-id="<?php echo $i?>">
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
<?php endforeach; ?>
	</div>