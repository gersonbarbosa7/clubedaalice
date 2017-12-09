<?php 
	global $post;
	$url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
?>
<article class="post">
	<header>
		<?php if($url): ?>
			<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
				<img src="<?php echo $url; ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>">
			</a>
		<?php else :  ?>
			<img src="<?php bloginfo('template_directory'); ?>/images/thumbnail-clube-da-alice.jpg" alt="Thumbnail Clube da Alice">
		<?php endif; ?>
		<h3>
			<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
				<span class="border">
					<?php the_title(); ?>
				</span>
			</a>
		</h3>
	</header>
	<div class="post-content">
		<?php the_excerpt(); ?>
	</div>
	<footer>
		<a href="<?php the_permalink(); ?>" class="read-more" title="<?php the_title(); ?>">
			CONTINUE LENDO <i class="fa fa-arrow-circle-right"></i>
		</a>
		<ul class="share-icons">
			<?php get_template_part('includes/modules/module', 'share'); ?>
		</ul>
	</footer>
</article>