<?php 
	global $wpdb, $i;

	$eventos = $wpdb->get_results("
		SELECT post_id FROM ".$wpdb->postmeta."
		WHERE `meta_key` = 'data'
		AND `meta_value` >= NOW()
		ORDER BY meta_value ASC
		LIMIT 10
	");

	$i = 0;

	$postsIDS = array();

	foreach ($eventos as $evento) {
		array_push($postsIDS, $evento->post_id);
	}

	if ( !empty($postsIDS)) {
		$args = array(
			'post__in' => $postsIDS,
			'orderby' => 'id',
			'order' => 'asc',
			'post_type' => 'eventos',
			'showposts' => 10,
			'posts_per_page' => 10,
			'post_status' => 'publish'
		);

		$eventos = new WP_Query($args);

		echo '<div class="tab-content">';
		if ($eventos->have_posts()) :
			while ($eventos->have_posts()) :
				$eventos->the_post();
				$i++;
				get_template_part('includes/contents/content', 'evento');
			endwhile;
		endif;
		echo '</div>';
	}