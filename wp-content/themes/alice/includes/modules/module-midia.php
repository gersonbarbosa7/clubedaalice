		<section class="titulo-com-faixas" id="alice-na-midia">
			<header>				
				<h3><span>CLUBE DA ALICE NA MÍDIA</span></h3>				
			</header>
			<div class="main">
				<div id="alice-na-midia__container">
					<div class="clube-da-alice-na-midia owl-carousel owl-theme">
						<?php 
							$args = array(
								'post_type' => 'imprensa',
								'showposts' => 5
							);

							$materias = new WP_Query($args);

							if ($materias->have_posts()) :
								while ($materias->have_posts()) :
									$materias->the_post();
									get_template_part('includes/contents/content', 'midia');
								endwhile;
							endif;
							wp_reset_query();
						?>
					</div>
				</div>
			</div>
		</section>