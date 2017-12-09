<div class="widget widget-mais-lidas titulo-com-faixas">
	<header>
		<h3><span>MAIS LIDAS</span></h3>
	</header>
	<div class="widget-content">
		<ul class="lista">
			<?php 
				global $wpdb;

				$maisLidas = $wpdb->get_results("
					SELECT post_id, meta_value FROM ".$wpdb->postmeta."
					WHERE `meta_key` = 'post_views_count' 
					ORDER BY `meta_value` DESC
				", ARRAY_A);

				// Compara se $a é maior que $b
				function cmp($a, $b) {
					return $a['meta_value'] < $b['meta_value'];
				}
				 
				// Ordena
				usort($maisLidas, 'cmp');

				//var_dump($maisLidas);

				$i = 0;

				foreach ($maisLidas as $materia) {
					$post = get_post($materia['post_id']);

					if ($post->post_type !== 'post')
						continue;

					$i++;

					if ($i === 5)
						break;
			?>
					<li>
						<span class="number">
							<?php echo $i; ?>
						</span>
						<a href="<?php echo get_the_permalink($materia['post_id']); ?>" title="<?php echo get_the_title($materia['post_id']); ?>">
							<?php echo get_the_title($materia['post_id']); ?>
						</a>
					</li>
			<?php
				}
			?>
		</ul>
	</div>
</div>