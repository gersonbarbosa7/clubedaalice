<nav>
	<div class="container">
		<div class="row">
			<ul class="categorias categorias-empresas owl-carousel owl-theme cats">
				<?php 
					global $categoria;
					$args = [
						'taxonomy' => 'categoria_da_empresa',
						'orderby' => 'title',
						'order' => 'ASC'
					];
					$terms = get_terms($args);
					//asort($terms);
					
					foreach( $terms as $term) : 
						$parent = $term->parent;
						$categoria = $term;
						
						if ( $parent=='0' ):
							get_template_part('includes/contents/content', 'menu-empresa');
						endif; 
					endforeach;
				?>
			</ul>
		</div>
	</div>	
</nav>