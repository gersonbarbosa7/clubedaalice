<!--container-->
</div>
<?php 
	global $post;
	$capa_da_postagem = get_field('capa_da_postagem');
?>

<section id="interna-subheader" style="background-image: url('<?php echo $capa_da_postagem; ?>');">
	<div class="tarja"></div>
	<header class="container">
		<hgroup>
			<h2>
				<?php the_title(); ?>
			</h2>
			<hr>
		</hgroup>
	</header>
</section>

<div class="container">
	<?php get_template_part('includes/modules/module', 'banner'); ?>

		<div id="posts">
			<div class="main">
				<article class="post">
					<div class="post-content">
						<?php 						
							the_content(); 
							$codigo_adicional = get_field('codigo_adicional');
							if($codigo_adicional):
								echo $codigo_adicional;
							endif;
						?>
					</div>
				</article>
			</div>
		</div>


