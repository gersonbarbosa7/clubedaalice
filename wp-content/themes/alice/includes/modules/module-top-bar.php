<div id="top-bar" class="menu-azul">
	<div class="container">
		<nav>
			<?php 
				wp_nav_menu(array(
					'menu' => 'menu_superior',
					'menu_class' => 'hidden-xs',
					'container' => false,
					'theme_location' => 'menu_superior'
				));
			?>

			<ul class="responsivo visible-xs">
				<li>
					<a href="http://carteirinha.clubedaalice.com.br/">
						<img src="<?php bloginfo('template_directory'); ?>/images/alice-bottom-rosa.png" alt="Clube de Descontos Alice"> Vem pro Clube!
					</a>
				</li>

				<li>
					<a class="chamada" href="#">
						<i class="fa fa-bars"></i>
					</a>
				</li>
			</ul>

			<ul class="menu-dropdown" style="display: none;">
				<nav>
					<?php 
						wp_nav_menu(array(
							'menu' => 'menu_superior',
							'container' => false,
							'theme_location' => 'menu_superior'
						));
					?>
				</nav>
			</ul>


		</nav>

		<?php get_search_form(); ?>
	</div>
</div>