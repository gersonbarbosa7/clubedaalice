<?php
	get_header();
	the_post();
	setPostViews(get_the_ID());
	get_template_part('includes/pages/empresa');
	get_footer();