<?php
	get_header();
	setPostViews(get_the_ID());
	get_template_part('includes/pages/interna');
	get_footer();