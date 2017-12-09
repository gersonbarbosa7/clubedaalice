<!--container-->
</div>
<?php 
	$fundo = get_field('background', 'category_'.get_queried_object()->term_id);
	$descricao = get_field('descricao', 'category_'.get_queried_object()->term_id);
?>
<section id="categoria-subheader" style="background-image: url('<?php echo $fundo; ?>');">
	<div class="tarja"></div>
	<header class="container">
		<hgroup>
			<h2>
				<?php single_term_title(); ?>
			</h2>
			<hr>
			<h5>
				<?php echo $descricao; ?>
			</h5>
		</hgroup>
	</header>
</section>
<div class="container">
	<?php // get_template_part('includes/modules/module', 'banner'); ?>
	<div id="content-page" class="inicio">
		
		<div class="col-sm-8">
		<?php 
			get_template_part('includes/modules/module', 'posts');
		?>
		</div>

		<div class="col-sm-4">

		<?php
			//get_template_part('includes/modules/module', 'pinterest');
			get_sidebar(); 
		?>
		</div>
	</div>