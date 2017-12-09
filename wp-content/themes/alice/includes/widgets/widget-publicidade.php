<div class="widget widget-publicidade titulo-com-faixas">
	<header>
		<h3><span>PUBLICIDADE</span></h3>
	</header>
	<div class="widget-content">

				<?php 
					global $printedAds;

					$args = array(
					    'post_type' => 'publicidades',
					    'posts_per_page' => '2',
					    'orderby' => 'rand',
					    'post__not_in' => $printedAds,
					    'tax_query' => array(
					        array(
					            'taxonomy' => 'categoria_publicidades',
					            'field' => 'slug',
					            'terms' => array ('anuncio-menor')
					        )
					    )
					);
					$query = new WP_Query( $args );
					if($query->have_posts()): while( $query->have_posts() ) : $query->the_post();  setPostViews(get_the_ID());
				?>
					<a href="<?php the_field('link'); ?>" title="<?php the_title(); ?>">
						<?php the_post_thumbnail(); ?>
					</a>
				<?php
					endwhile; endif; 
					wp_reset_query();
				?>

	</div>
</div>