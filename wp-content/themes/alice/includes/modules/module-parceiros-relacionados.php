	<?php 
		global $category;
	?>
	<!--posts-relacionados-->
	<section id="parceiros-relacionados">
		<header>
			<hgroup>
				<h5 class="hidden">
					<a href="<?php echo get_term_link($category[0], $category[0]->slug); ?>" title="<?php echo $category[0]->name; ?>">
						<?php
							echo $category[0]->name;
						?>
					</a>
				</h5>
				<h3>Mais descontos e vantagens para Alices de Carteirinha</h3>
			</hgroup>
		</header>
		<div class="main">
			<?php
				global $category;

				$category = get_the_category();

				$args = array(
					'post_type' => 'empresas',
					'showposts' => 3,
					'category_name' => $category[0]->slug,
					'post__not_in' => array(get_the_ID()),
					'orderby' => 'RAND()'
				);

				$posts = new WP_Query($args);

				if ($posts->have_posts()) :
					while ($posts->have_posts()) :
						$posts->the_post();
						get_template_part('includes/contents/content', 'parceiro-relacionado');
					endwhile;
				endif;
				wp_reset_query();
			?>
		</div>
	</section>