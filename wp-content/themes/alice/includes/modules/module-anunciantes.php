<?php 
	$queried_object = get_queried_object();
	$anunciante_destaque = get_field('anunciante_destaque', 'categoria_da_empresa_' . $queried_object->term_id);

	if ( get_query_var('paged') ) { 
		$paged = get_query_var('paged');
	}
	elseif ( get_query_var('page') ) {
		$paged = get_query_var('page');
	}
	else {
		$paged = 1;
	}
	$args = array(
		'post_type' => 'empresas',
		'showposts' => 6,
		'paged' => $paged,
		'orderby' => 'meta_value_num',
		'meta_key' => 'post_views_count',
		'post__not_in' => $anunciante_destaque,
		'tax_query' => array(
            array(
                'taxonomy' => 'categoria_da_empresa',
                'field' => 'slug',
                'terms' => $queried_object->slug,
            )
        )
	);

	$anunciantes = new WP_Query($args);

	if ($anunciantes->have_posts()) :
		while ($anunciantes->have_posts()) :
			$anunciantes->the_post();
			get_template_part('includes/contents/content', 'anunciante');
		endwhile;
		wp_pagenavi(['query' => $anunciantes]);
	endif;
	wp_reset_query();