<aside id="sidebar">
	<?php 
		//get_template_part('includes/widgets/widget', 'newsletter');
		dynamic_sidebar('widget-pinterest'); 
		//get_template_part('includes/widgets/widget', 'publicidade');		
		get_template_part('includes/widgets/widget', 'facebook');
		get_template_part('includes/widgets/widget', 'mais-lidas');
		get_template_part('includes/widgets/widget', 'posts-relacionados');
		//get_template_part('includes/widgets/widget', 'publicidade');
	?>
</aside>