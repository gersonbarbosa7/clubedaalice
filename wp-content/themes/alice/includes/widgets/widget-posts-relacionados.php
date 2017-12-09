<div class="widget titulo-com-faixas widget-posts-relacionados">
	<header>
		<h3><span>NA MESMA CATEGORIA</span></h3>
	</header>
	<div class="widget-content">
		<ul class="posts">
			<?php
				global $category;

				$category = get_the_category();

				$args = array(
					'post_type' => 'post',
					'showposts' => 2,
					'category_name' => $category[0]->slug,
					'post__not_in' => array(get_the_ID())
				);

				$posts = new WP_Query($args);

				if ($posts->have_posts()) :
					while ($posts->have_posts()) :
						$posts->the_post();
						get_template_part('includes/contents/content', 'post-relacionado');
					endwhile;
				endif;
				wp_reset_query();
			?>
		</ul>
	</div>
</div>