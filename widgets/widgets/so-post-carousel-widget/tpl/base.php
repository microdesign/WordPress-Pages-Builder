<?php

$query = siteorigin_widget_post_selector_process_query( $instance['posts'] );
$the_query = new WP_Query( $query );
?>
<ul class="sow-posts-items">
	<?php while($the_query->have_posts()) : $the_query->the_post(); ?>
		<li class="sow-carousel-item">
			<div class="sow-carousel-thumbnail" <?php if( has_post_thumbnail() ): ?> style="background-image: url(<?php $img = wp_get_attachment_image_src(get_post_thumbnail_id(), 'sow-carousel-default'); echo $img[0] ?>)" <?php endif; ?> >
				<a href="<?php the_permalink() ?>" class="sow-carousel-default-thumbnail">
					<span class="overlay"></span>
				</a>
				<h3><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h3>
			</div>
		</li>
	<?php endwhile; wp_reset_postdata(); ?>
</ul>

<script>
	jQuery( function($){

		$('.sow-posts-items').owlCarousel( {
			autoplay:true,
			loop:true,
			nav:true,
			autoWidth:true,
			items:"<?=$instance['per_page']?>"
		});
	});
</script>