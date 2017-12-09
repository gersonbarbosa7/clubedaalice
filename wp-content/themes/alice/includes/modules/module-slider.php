</div>
<div id="slider">
	<div class="slide-home owl-carousel owl-theme">
		<?php 
			$args = array(
				'post_type' => 'slider',
				'showposts' => 5
			);

			$slides = new WP_Query($args);

			if ($slides->have_posts()) :
				while ($slides->have_posts()) :
					$slides->the_post();
					get_template_part('includes/contents/content', 'slide');
				endwhile;
			endif;
			wp_reset_query();
		?>
	</div>
	<div class="clearfix"></div>
</div>

<div class="container">