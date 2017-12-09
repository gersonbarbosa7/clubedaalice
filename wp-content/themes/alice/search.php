<?php 
	get_header();
	get_template_part('includes/modules/module', 'banner');
	echo '<div id="content-page">';
	get_template_part('includes/modules/module', 'posts');
	get_sidebar();
	echo '</div>';
	get_footer();