<div class="grid">
	<?php 
		global $query_string;

		$anuncios = new WP_Query(array(
			'post_type' => 'publicidades',
			'posts_per_page' => 4,
			'orderby' => 'rand'
		));

		$anunciosData = array();
		$i = 0;

		while ($anuncios->have_posts()) :
			$anuncios->the_post();
			$i++;
			$anunciosData[$i] = get_post(get_the_ID());
		endwhile;

		$post_type = '&post_type=post';
		$template = 'post';

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
		$posts = new WP_Query($query_string . $post_type . '&orderby=date&order=DESC&posts_per_page=11&paged=' . $paged);

		$i = 0;

		if ($posts->have_posts()) :
			while ($posts->have_posts()) :
				$posts->the_post();
				$url = wp_get_attachment_url(get_post_thumbnail_id($post->ID));		
				$category = get_the_category();
				$i++;
	?>			
				<div class="grid-item">
					<div <?php post_class('box') ?>>

						<a href="<?php the_permalink(); ?>">
							<div class="imagem-destacada">
								<span class="views">
									<i class="fa fa-eye"></i> <?php echo getPostViews(get_the_ID()); ?>
								</span>	
								<img class="img-responsive" src="<?php echo $url; ?>" alt="<?php the_title(); ?>">
							</div>
						</a>

						<div class="conteudo">
							<a href="<?php the_permalink(); ?>"><h2><?php the_title(); ?></h2></a>

						</div>
						<ul class="share-icons">
							<?php get_template_part('includes/modules/module', 'share'); ?>
						</ul>

						<a class="categoria" href="<?php echo get_term_link($category[0], $category[0]->slug); ?>" title="<?php echo $category[0]->cat_name; ?>">
							<?php
								echo $category[0]->cat_name;
							?>
						</a>
					</div>
				</div>
	<?php
				if ($i <= 4) {
					$anuncio = $anunciosData[$i];
					$url = wp_get_attachment_url(get_post_thumbnail_id($anuncio->ID));	
	?>
					<div class="grid-item">
						<div class="box anuncio google-ads">
							<a href="<?php echo get_field('link', $anuncio->ID); ?>">
								<img src="<?php echo $url; ?>" alt="<?php $anuncio->post_title; ?>">
							</a>
							<h3>Publicidade</h3>
						</div>
					</div>
	<?php
				}
				elseif ($i > 4 && $i <= 6) {
	?>
					<div class="grid-item">
						<div class="box google-ads">
							<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
							<!-- Anúncio2 -->
							<ins class="adsbygoogle"
							     style="display:inline-block;width:300px;height:250px"
							     data-ad-client="ca-pub-3217059451620544"
							     data-ad-slot="4457307312"></ins>
							<script>
							(adsbygoogle = window.adsbygoogle || []).push({});
							</script>

							<h3>Publicidade</h3>
						</div>
					</div>
	<?php
				}
			endwhile;
		endif;
	?>
	<!--<div class="hidden-xs grid-item">
		<div class="fb-page" data-href="https://www.facebook.com/clubedaaliceoficial" data-height="500" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/clubedaaliceoficial"><a href="https://www.facebook.com/clubedaaliceoficial">Clube da Alice</a></blockquote></div></div>
	</div>-->
	<?php wp_reset_query(); ?>
</div>
<?php wp_pagenavi( array( 'query' => $posts )); ?>