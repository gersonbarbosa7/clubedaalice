<?php 
	global $categoria;
	$icone = get_field('icone', 'categoria_da_empresa_' . $categoria->term_id);

	$class = (get_term_link($categoria, $categoria->slug) == URLATUAL || strpos(URLATUAL, get_term_link( $categoria, $categoria->slug)) !== false ? 'class="active item"' : 'class="item"');
?>
<li <?php echo $class; ?>>
	<a href="<?php echo get_term_link($categoria, $categoria->slug); ?>" title="<?php echo $categoria->name; ?>">
		<figure>
			<img src="<?php echo $icone; ?>" alt="<?php echo $categoria->name; ?>" title="<?php echo $categoria->name; ?>">
		</figure>		
		<?php echo $categoria->name; ?>		
		<span class="seta"></span>
	</a>
</li>