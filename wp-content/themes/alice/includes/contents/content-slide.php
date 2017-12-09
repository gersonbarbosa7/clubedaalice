<?php 
	global $post;
	$url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
?>
<div class="item">
	<a href="<?php the_field('link'); ?>" title="<?php the_title(); ?>">
		<?php 
			$slide_responsivo = get_field('slide_responsivo');
			if($slide_responsivo): 
		?>
			<div class="hidden-xs">
				<img src="<?php echo $url; ?>" title="<?php the_title(); ?>" alt="<?php the_title(); ?>">
			</div>		
			<div class="visible-xs">
				<img src="<?php echo $slide_responsivo; ?>" title="<?php the_title(); ?>" alt="<?php the_title(); ?>">
			</div>
		<?php else : ?>
			<img src="<?php echo $url; ?>" title="<?php the_title(); ?>" alt="<?php the_title(); ?>">
		<?php endif; ?>
	</a>
</div>