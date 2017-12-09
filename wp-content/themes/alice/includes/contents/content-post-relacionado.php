<?php 
	global $post, $category;
	$url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
?>
<li>
	<?php if($url): ?>
		<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
			<img src="<?php echo $url; ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>">
		</a>
	<?php endif; ?>
	<a href="<?php echo get_term_link($category[0], $category[0]->slug); ?>" class="categoria"><?php echo strtoupper($category[0]->cat_name); ?></a>
	<h3>
		<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
			<?php the_title(); ?>
		</a>
	</h3>
</li>