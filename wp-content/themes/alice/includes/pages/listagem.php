<?php get_template_part('includes/modules/module', 'header-empresas'); ?>
<div class="container">
	<section id="listagem">
		<header>
			<h2>PARCEIROS ALICE EM <strong><?php single_term_title(); ?></strong></h2>
		</header>
		<div class="main">
			<?php
				get_template_part('includes/contents/content', 'banner-anunciante-destaque');
				get_template_part('includes/modules/module', 'anunciante-destaque');
				get_template_part('includes/modules/module', 'anunciantes');
			?>
		</div>
	</section>