<li class="item">
	<?php 
		$icone = get_sub_field('icone');
		$desconto = get_sub_field('desconto');

		if ($desconto) :
			$args = [
				'post_type' => 'faixa',
				'meta_query' => [
					'relation' => 'AND',
					[
						[
							'key' => 'max',
							'value' => $desconto,
							'compare' => '>='
						],
						[
							'key' => 'min',
							'value' => $desconto,
							'compare' => '<='
						]
					]
				],
				'fields' => 'ids'
			];

			$faixa = new WP_Query($args);
			$faixa = is_array($faixa->posts) && !empty($faixa->posts) ? end($faixa->posts) : '9006';

			//wp_reset_query();
	?>
			<div class="desconto" style="background: <?php the_field('cor_do_desconto', $faixa); ?>">
				<?php echo $desconto . '%'; ?>
			</div>
	<?php
		elseif($icone):
	?>	
			<img src="<?php echo get_sub_field('icone'); ?>" title="<?php the_title(); ?>" alt="<?php the_title(); ?>">
	<?php 
		else: 
	?>
			<img src="<?php bloginfo('template_directory'); ?>/images/selo_vantagem1.png" title="<?php the_title(); ?>" alt="<?php the_title(); ?>">
	<?php 
		endif;
	?>
	<h4>
		<?php echo get_sub_field('titulo'); ?>
	</h4>
</li>