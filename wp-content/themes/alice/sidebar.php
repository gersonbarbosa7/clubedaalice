<aside id="sidebar">
	<?php 
		//get_template_part('includes/widgets/widget', 'newsletter');
		get_template_part('includes/widgets/widget', 'facebook');
		dynamic_sidebar('widget'); 
		get_template_part('includes/widgets/widget', 'publicidade');		
		if(!is_archive()):
		get_template_part('includes/widgets/widget', 'mais-lidas');
		endif;
		//get_template_part('includes/widgets/widget', 'publicidade');
	?>
</aside>