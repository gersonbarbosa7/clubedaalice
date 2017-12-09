<?php 
	setPostViews($anuncio);
	$url = wp_get_attachment_url( get_post_thumbnail_id($anuncio) );
?>
<article class="post">
	<header>
		<?php if($url): ?>
			<a href="<?php the_field('link', $anuncio); ?>"  target="_blank" title="<?php get_the_title($anuncio); ?>">
				<img src="<?php echo $url; ?>" alt="<?php get_the_title($anuncio); ?>" title="<?php get_the_title($anuncio); ?>">
			</a>
		<?php else :  ?>
			<a href="<?php the_field('link', $anuncio); ?>"  target="_blank" title="<?php get_the_title($anuncio); ?>">
				<img src="<?php bloginfo('template_directory'); ?>/images/thumbnail-clube-da-alice.jpg" alt="Thumbnail Clube da Alice">
			</a>
		<?php endif; ?>
	</header>
</article>