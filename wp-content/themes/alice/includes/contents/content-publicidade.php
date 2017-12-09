<?php 
	global $post;
	$url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
?>
<a href="<?php the_field('link'); ?>" title="<?php the_title(); ?>" target="_blank">
	<img src="<?php echo $url; ?>" title="<?php the_title(); ?>" alt="<?php the_title(); ?>">
</a>