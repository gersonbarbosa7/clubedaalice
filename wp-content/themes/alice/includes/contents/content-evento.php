<?php global $i; ?>
<section id="evento-<?php echo $i; ?>" role="tabpanel" class="evento tab-pane <?php echo $i === 1 ? 'active' : ''; ?>">
	<header>
		<h2>
			<?php the_title(); ?>
		</h2>
	</header>
	<div class="main">
		<ul id="dados-do-evento">
			<h3>Sobre o Evento</h3>		
			<li>
				<h5><i class="fa fa-map-marker"></i> LOCAL DO EVENTO</h5>
				<?php the_field('local'); ?>
			</li>
			<li>
				<h5><i class="fa fa-clock-o"></i> HORÁRIO DO EVENTO</h5>
				<?php the_field('horario'); ?>
			</li>
			<li>
				<h5><i class="fa fa-share-alt"></i> COMPARTILHE ESTE EVENTO</h5>
				<ul class="share">
					<?php get_template_part('includes/modules/module', 'share'); ?>
				</ul>
			</li>
		</ul>
		<?php the_content(); ?>
	</div>
</section>