	<div class="menu-principal menu-blog">
		<div class="bg-border">
			<div class="container">				
				<nav>
					<ul>
						<li>
							<a class="menu-responsivo">
								<i class="fa fa-bars"></i> Categorias
							</a>
						</li>			
						<li class="hidden-xs anunciantes">
							<a href="<?php echo home_url('/descontos'); ?>" title="Anunciantes Clube da Alice">
								<img class="cestinha" src="<?php echo IMG; ?>icone-cesta.png" alt="Anunciantes Clube da Alice" title="Anunciantes Clube da Alice">
								Parceiros
							</a>
						</li>
					</ul>
				</nav>
				<div class="menu-categorias" style="display: none;">
					<nav>
						<ul>
							<?php 
								global $categoria;
								$terms = get_terms('category');
								
								foreach( $terms as $term) : 
									$parent = $term->parent;
									$categoria = $term;
									
									if ( $parent=='0' ):
										get_template_part('includes/contents/content', 'menu');
									endif; 
								endforeach;
							?>
						</ul>
					</nav>
				</div>
			</div>
		</div>
	</div>

