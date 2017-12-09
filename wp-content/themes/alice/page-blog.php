<?php
	/*
	Template Name: BLOG
	 */
	get_header();
	//get_template_part('includes/modules/module', 'banner');
	get_template_part('includes/modules/module', 'slider');
	echo '<div id="content-page">';
	get_template_part('includes/modules/module', 'posts');
	get_sidebar('home');
	echo '</div>';
	get_footer();