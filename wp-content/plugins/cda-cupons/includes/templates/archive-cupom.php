<?php
	get_header();
	?>
	<div class="container">
	<div class="row">
		<ul class="empresas">
			<?php
			  $temp = $wp_query;
			  $wp_query= null;
			  $wp_query = new WP_Query('post_type=cda_cupom&paged=' . $paged);
			  while ($wp_query->have_posts()) : $wp_query->the_post();
				global $post;
				$url = wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'cda_cupom' );
				?>
				<li class="box-parceiro">
					<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="box-thumb">
						<img src="<?php echo $url; ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>">
					</a>
					<div class="box-content">
						<hgroup>
							<h3>
								<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" >
									<?php the_title(); ?>
								</a>
								<a href="<?php the_permalink(); ?>" title="<?php echo the_field('titulo_cupom_2'); ?>" >
									<?php echo the_field('titulo_cupom_2'); ?>
								</a>
							</h3>
							<h5>
								<?php echo substr(strip_tags(get_the_content()), 0, 100) . '[...]'; ?>
							</h5>
						</hgroup>
						<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="read-more">
							Retire seu cupom <i class="fa fa-arrow-circle-right"></i>
						</a>
					</div>
				</li>
			<?php
			  endwhile;
			  if(function_exists('wp_pagenavi')) { wp_pagenavi(); }
			  $wp_query = null; $wp_query = $temp;
			  wp_reset_query();
			 ?>
		 </ul>
	</div>
	<?php
	get_footer();