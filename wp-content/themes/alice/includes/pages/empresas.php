<?php get_template_part('includes/modules/module', 'header-empresas'); ?>
<div class="container">
	<?php get_template_part('includes/modules/module', 'slider-empresas'); ?>

	<div class="row">
		<ul class="empresas">
			<?php
			  $temp = $wp_query;
			  $wp_query= null;
			  $args = [
			  	'post_type' => 'empresas',
			  	'orderby' => 'meta_value_num',
			  	'meta_key' => 'post_views_count',
			  	'posts_per_page' => 9,
			  	'paged' => $paged
			  ];
			  $wp_query = new WP_Query($args);
			  while ($wp_query->have_posts()) : $wp_query->the_post();
			?>
				<?php get_template_part('includes/contents/content', 'anunciante'); ?>
			<?php
			  endwhile;
			  if(function_exists('wp_pagenavi')) { wp_pagenavi(); }
			  $wp_query = null; $wp_query = $temp; 
			  wp_reset_query();
			 ?>
			 <div class="clearfix"></div>
		 </ul>
	</div>
</div>
