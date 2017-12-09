<nav>
	<ul class="datas">
		<?php 
			global $wpdb, $evento, $i;

			$eventos = $wpdb->get_results("
				SELECT post_id, meta_value FROM ".$wpdb->postmeta."
				WHERE `meta_key` = 'data'
				AND `meta_value` >= NOW()
				ORDER BY meta_value ASC
				LIMIT 10
			");

			$i = 0;

			if (!empty($eventos) && is_array($eventos)) {
				foreach ($eventos as $evento) {

					$eventoOBJ = get_post($evento->post_id);

					if (is_object($eventoOBJ) && $eventoOBJ->post_type === 'eventos' && $eventoOBJ->post_status === 'publish') {
						$i++;
						get_template_part('includes/contents/content', 'data-evento');
					}
					
				}
			}
			
			if ($i === 0) {
				echo '<li class="nao-existe">Nenhum evento encontrado.</li>';
			}
		?>
	</ul>
</nav>