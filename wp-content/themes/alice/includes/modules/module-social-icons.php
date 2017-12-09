<ul class="social-icons">
	<?php 
		$redes_sociais = array(
			'facebook' => get_field('facebook', 'options'),
			'instagram' => get_field('instagram', 'options'),
			'youtube' => get_field('youtube', 'options'),
			'twitter' => get_field('twitter', 'options')
		);
		global $icon, $value;
		
		foreach ($redes_sociais as $icon => $value) {
			if ($value)
				get_template_part('includes/contents/content', 'social');
		}
	?>
</ul>