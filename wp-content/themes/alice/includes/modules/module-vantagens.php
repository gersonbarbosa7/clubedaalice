<div id="vantagens">
	<div class="container">
		<section id="vantagens-slider">
			<header>
				<h3> Exclusivo para <strong>Alices de Carteirinha</strong></h3>
			</header>
			<div class="main">
				<ul class="vantagens-alice">
					<?php 
						if( have_rows('vantagens') ):
							while( have_rows('vantagens') ) :
								the_row();
								get_template_part('includes/contents/content', 'slide-vantagem');
							endwhile;
						endif;
					?>
				</ul>
				<p id="infos-adicionais"><?php echo get_field('informacoes_adicionais') ? get_field('informacoes_adicionais') : ''; ?></p>
			</div>
		</section>
	</div>
</div>