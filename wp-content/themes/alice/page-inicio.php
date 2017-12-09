<?php
/*
	Template Name: Início
*/
get_header(); ?>
	<section class="inicio">
		<?php 
			get_template_part('includes/modules/module', 'slider'); 
			get_template_part('includes/modules/module', 'pinterest'); 
			get_template_part('includes/widgets/widget', 'mais-lidas');
			echo "<ul class='widgets-pequenos'>";
			dynamic_sidebar('widget-pinterest'); 
			echo "</ul>";
		?>
	</section>
<?php get_footer(); ?>