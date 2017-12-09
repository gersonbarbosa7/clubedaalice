<?php 
	global $post;
	$url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
?>
<article class="post">
	<header>
		<h3>
			<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
				<span class="border">
					<?php the_title(); ?>
				</span>
			</a>
		</h3>
		<div class="post-categories">
			<?php 
				$category = get_the_category();
			?>
			<a href="<?php echo get_term_link($category[0], $category[0]->slug); ?>" title="<?php echo $category[0]->cat_name; ?>">
				<?php
					echo $category[0]->cat_name;
				?>
			</a>
		</div>

		
		<?php if($url): ?>
			<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
				<img src="<?php echo $url; ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>">
			</a>
		<?php else :  ?>
			<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
				<img src="<?php bloginfo('template_directory'); ?>/images/thumbnail-clube-da-alice.jpg" alt="Thumbnail Clube da Alice">
			</a>
		<?php endif; ?>

		<div class="post-info">
			<div class="hidden">
			<?php
				echo get_avatar( get_the_author_meta('ID'), 52, null, get_the_author()); 
				the_author();
			?>
			</div>
			<time><?php the_date('d/m/Y'); ?></time>
			<span class="views"><i class="fa fa-eye"></i> <?php echo getPostViews(get_the_ID()); ?></span>
		</div>
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