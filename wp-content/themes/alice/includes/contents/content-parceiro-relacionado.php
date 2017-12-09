<?php 
	global $post, $category;
	$url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
?>
<div class="box-parceiro">
	<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
		<img src="<?php echo $url; ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>">
	</a>
	<div class="box-content">
		<hgroup>
			<h3>
				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
					<?php the_title(); ?>
				</a>
			</h3>
			<h5>
				<?php echo substr(strip_tags(get_the_content()), 0, 100) . '[...]'; ?>
			</h5>
		</hgroup>
		<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="read-more">
			VEJA AS VANTAGENS DAS ALICES <i class="fa fa-arrow-circle-right"></i>
		</a>
	</div>
</div>