<?php
	/*
	Template Name: HOME
	 */
	get_header();
	//get_template_part('includes/modules/module', 'banner');
	get_template_part('includes/modules/module', 'slider');
	//get_template_part('includes/modules/module', 'newsletter');
	echo '<div id="content-page">';
	get_template_part('includes/modules/module', 'posts');
	get_sidebar('home');
	echo '</div>';
	get_footer();