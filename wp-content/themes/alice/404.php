<?php 
	get_header();
	get_template_part('includes/modules/module', 'banner');
	echo '<div id="content-page">';
	echo '
		<div class="alert alert-block alert-danger">
			<h2>Ops! Nada encontrado.</h2>
			Por favor, verifique os dados informados e tente novamente.
		</div>
	';
	echo '</div>';
	get_footer();