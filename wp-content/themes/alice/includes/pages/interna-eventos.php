<!--container-->
</div>
<section id="eventos-subheader">
	<header class="container">
		<hgroup>
			<h2>
				<?php the_title(); ?>
			</h2>
			<hr>
		</hgroup>
	</header>
</section>
<div class="container">
	<?php
			global $query_string;
			
			$eventos = new WP_Query($query_string . '&post_type=eventos&paged=' . $paged);

			if ($eventos->have_posts()) :
				while ($eventos->have_posts()) :
					$eventos->the_post();
					get_template_part('includes/contents/content', 'evento');
				endwhile;
				wp_pagenavi();
			else:
				echo '
					<div class="alert alert-block alert-danger">
						<h2>Ops! Nenhum evento encontrado.</h2>
						Por favor, verifique os dados informados e tente novamente.
					</div>
				';
			endif;
			wp_reset_query();
	?>