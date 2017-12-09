<?php 
	$publicidade = get_field('publicidade'); 
	if($publicidade = "sim"): 
?>
	<div class="banner-container">
		<div class="banner">
			<?php 
				$args = array(
				    'post_type' => 'publicidades', // it's default, you can skip it
				    'posts_per_page' => '1',
				    'orderby' => 'rand',
				    'tax_query' => array(
				        array(
				            'taxonomy' => 'categoria_publicidades',
				            'field' => 'slug',
				            'terms' => array ('anuncio-maior')
				        )
				    )
				);
				$query = new WP_Query( $args );
				if($query->have_posts()): while( $query->have_posts() ) : $query->the_post(); 
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
<?php endif; ?>