<?php
	$queried_object = get_queried_object();
	$anunciante_destaque = get_field('anunciante_destaque', 'categoria_da_empresa_' . $queried_object->term_id);

	if ($anunciante_destaque !== false && !empty($anunciante_destaque)) {
		$args = array(
			'post_type' => 'empresas',
			'showposts' => 1,
			'post__in' => $anunciante_destaque
		);

		$destaque = new WP_Query($args);

		if ($destaque->have_posts()) :
			while ($destaque->have_posts()) :
				$destaque->the_post();
				get_template_part('includes/contents/content', 'anunciante-destaque');
			endwhile;
		endif;
		wp_reset_query();
	}