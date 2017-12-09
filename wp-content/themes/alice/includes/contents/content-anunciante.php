<?php 
	global $post;
	$url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
?>
<li class="box-parceiro">
	<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="box-thumb">
		<img src="<?php echo $url; ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>">
	</a>
	<div class="box-content clearfix">
		<hgroup>
			<h3>
				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" >
					<?php the_title(); ?>
				</a>
			</h3>
			<h5>
				<?php echo substr(strip_tags(get_the_content()), 0, 100) . '[...]'; ?>
			</h5>
		</hgroup>
		<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="read-more">
			Ver mais detalhes <i class="fa fa-arrow-circle-right"></i>
		</a>
		<?php
			$vantagens = get_field('vantagens');
			$desconto = false;

			if ($vantagens) {
				foreach ($vantagens as $vantagem) {
					if ($vantagem['listagem'] === true) {
						$desconto = $vantagem;

						break;
					}
				}
			}

			$color = "#333333";

			if (is_array($desconto) && is_numeric($desconto['desconto'])) :
				$args = [
					'post_type' => 'faixa',
					'meta_query' => [
						'relation' => 'AND',
						[
							[
								'key' => 'max',
								'value' => $desconto['desconto'],
								'compare' => '>=',
								'type' => 'numeric'
							],
							[
								'key' => 'min',
								'value' => $desconto['desconto'],
								'compare' => '<=',
								'type' => 'numeric'
							]
						]
					],
					'fields' => 'ids'
				];

				$faixa = new WP_Query($args);
				$faixa = is_array($faixa->posts) && !empty($faixa->posts) ? end($faixa->posts) : '9006';

				$color = get_field('cor_do_desconto', $faixa);

				//wp_reset_query();
		?>
				<div class="desconto" style="background: <?php the_field('cor_do_desconto', $faixa); ?>">
					<?php echo '<strong>' . $desconto['desconto'] . '%</strong> OFF <sup>*</sup>'; ?>
				</div>
		<?php
			elseif (is_array($desconto)) :
		?>
				<div class="desconto" style="background: <?php echo $color; ?>">
					<?php echo 'VANTAGENS <sup>*</sup>'; ?>
				</div>
		<?php
			endif;
		?>
	</div>
	<ul class="anuncio-meta">
		<li><div class="fb-like" data-href="<?php the_permalink(); ?>" data-layout="button_count" data-action="like" data-size="small" data-show-faces="false" data-share="true"></div></li>
		<li><i class="fa fa-eye"></i> <?php echo getPostViews(get_the_ID()); ?></li>
	</ul>
	<div class="anuncio-obs" style="background: <?php echo $color; ?>"><?php echo isset($desconto['titulo']) ? '*' . $desconto['titulo'] : ''; ?></div>
</li>