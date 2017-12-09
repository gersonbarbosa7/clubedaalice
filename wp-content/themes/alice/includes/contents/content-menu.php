<?php
	global $categoria;
	$class = (get_term_link($categoria, $categoria->slug) == URLATUAL || strpos(URLATUAL, get_term_link( $categoria, $categoria->slug)) !== false ? 'class="current-menu-item"' : '');
?>
<li <?php echo $class; ?>>
	<a href="<?php echo get_term_link($categoria, $categoria->slug); ?>" title="<?php echo $categoria->name; ?>">
		<?php echo $categoria->name; ?>
	</a>
</li>