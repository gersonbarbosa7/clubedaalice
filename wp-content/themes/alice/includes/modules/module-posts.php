		<section id="posts" class="titulo-com-faixas">
			<header>
				<h3><span>POSTS</span></h3>
			</header>
			<div class="main">
				<?php
					global $query_string, $printedAds;

					$post_type = '&post_type=post';
					$template = 'post';
					$limit = get_field('quantidade_de_posts', 'options');

					if ( get_query_var('paged') ) { 
						$paged = get_query_var('paged');
					}
					elseif ( get_query_var('page') ) {
						$paged = get_query_var('page');
					}
					else {
						$paged = 1;
					}

					if (is_page())
						$query_string = '';
					if (is_search()) {
						$post_type = '';
						$template = 'search';
					}					
					$posts = new WP_Query($query_string . $post_type . '&orderby=date&order=DESC&posts_per_page=' . $limit . '&paged=' . $paged);
					$multiplo_para_exibir_anuncios = get_field('multiplo_para_exibir_anuncios', 'options');

					$i = 1;
					$printedAds = [];

					if ($posts->have_posts()) :
						while ($posts->have_posts()) :
							$posts->the_post();
							get_template_part('includes/contents/content', $template);
							if ($i % $multiplo_para_exibir_anuncios === 0) {
								$args = array(
								    'post_type' => 'publicidades',
								    'posts_per_page' => '1',
								    'orderby' => 'rand',
								    'post_status' => 'publish',
								    'post__not_in' => $printedAds,
								    'tax_query' => array(
								        array(
								            'taxonomy' => 'categoria_publicidades',
								            'field' => 'slug',
								            'terms' => array ('anuncio-menor')
								        )
								    ),
								    'fields' => 'ids'
								);

								$anuncio = new WP_Query( $args );
								if (is_array($anuncio->posts) && !empty($anuncio->posts)) {
									$anuncio = end($anuncio->posts);
									$printedAds[] = $anuncio;
									include(locate_template('includes/contents/content-anuncio.php'));
								}
							}
							$i++;
						endwhile;
						wp_pagenavi( array( 'query' => $posts ));
					else:
						echo '
							<div class="alert alert-block alert-danger">
								<h2>Ops! Nenhum post encontrado.</h2>
								Por favor, verifique os dados informados e tente novamente.
							</div>
						';
					endif;
					wp_reset_query();
				?>
			</div>
		</section>