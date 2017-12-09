<?php 
	global $post, $category;
	$category = wp_get_post_terms($post->ID, 'categoria_da_empresa');
	$galeria = get_field('galeria');
?>
<!--container-->
</div>
<div class="thumb-destaque">
	<?php /* if($galeria): ?>
		<div class="fumaca hidden-xs"></div>
	<?php endif; */ ?>
	<?php 
		$capa_responsiva = get_field('capa_responsivo'); 
		if($capa_responsiva):
	?>
		<div class="hidden-xs">
			<img id="destaque-parceiro" src="<?php the_field('capa'); ?>" title="<?php the_title(); ?>" alt="<?php the_title(); ?>">
		</div>
		<div class="visible-xs">
			<img id="destaque-parceiro" src="<?php echo $capa_responsiva; ?>" title="<?php the_title(); ?>" alt="<?php the_title(); ?>">
		</div>
	<?php else : ?>
		<img id="destaque-parceiro" src="<?php the_field('capa'); ?>" title="<?php the_title(); ?>" alt="<?php the_title(); ?>">
	<?php endif; ?>
</div>
<?php
	if( have_rows('galeria') ): ?>
	<div class="container">
		<ul id="galeria" class="galeria owl-theme owl-carousel">
			<?php while ( have_rows('galeria') ) : the_row(); ?>
				<li>
					<a href="<?php  the_sub_field('imagem'); ?>" data-lightbox="roadtrip" data-title="<?php the_sub_field('legenda'); ?>">
						<img src="<?php the_sub_field('imagem'); ?>" alt="<?php the_sub_field('legenda'); ?>">
					</a>
				</li>		
			<?php endwhile; ?>
		</ul>
	</div>
<?php	    
	endif;
?>
<section id="detalhes-do-parceiro" class="container">
	<header>
		<hgroup>
			<h5>
				<a href="<?php echo get_term_link($category[0], $category[0]->slug); ?>" title="<?php echo $category[0]->name; ?>">
					<?php
						echo $category[0]->name;
					?>
				</a>
			</h5>
			<h3>
			<?php the_title(); ?></h3>
		</hgroup>
		<a class="ir-para-descontos" href="#ver-descontos-aqui">Ver descontos</a>
	</header>
	<div class="main">
		<ul class="content">
			<li>
				<div class="altura">
					<?php the_content(); ?>
				</div>
				
				<div class="clearfix"></div>
				
				<!--<div class="compartilhe">
					<h5><i class="fa fa-thumbs-up"></i> Curta e compartilhe esta página:</h5>
					<div class="hidden-xs">
						<div class="fb-like" data-href="<?php the_permalink(); ?>" data-layout="standard" data-action="like" data-show-faces="true" data-share="true"></div>
					</div>
					<div class="visible-xs">
						<div class="fb-like" data-href="<?php the_permalink(); ?>" data-layout="button_count" data-action="like" data-show-faces="true" data-share="true"></div>
					</div>
				</div>-->

				<div class="fb-like" data-href="<?php the_permalink(); ?>" data-layout="button_count" data-action="like" data-size="small" data-show-faces="false" data-share="true"></div>

				<?php $views = getPostViews(get_the_ID()); if($views): ?>
						<span class="icone"><i class="fa fa-eye"></i></span>
						<?php echo $views; ?>
				<?php endif; ?>

				<br><br>

				<div class="clearfix"></div>
			</li>

			<li>
				<?php
					$email = get_field('email');
					$telefone = get_field('telefones');
					$endereco = get_field('endereço');
					$site = get_field('site');
				?>
				<ul id="dados-de-contato">
					<?php if($email): ?>
						<li>
							<span class="icone"><i class="fa fa-envelope"></i></span>
							<a class="lowercase" href="mailto:<?php the_field('email'); ?>" title="Fale conosco"><?php the_field('email'); ?></a>
						</li>
					<?php endif; if($telefone): ?>
						<li>
							<span class="icone"><i class="fa fa-phone"></i></span>
							<address>
								<?php the_field('telefones'); ?>
							</address>
						</li>
					<?php endif; if($site): ?>
						<li>
							<span class="icone"><i class="fa fa-desktop"></i></span>
							<a class="lowercase" href="<?php the_field('site'); ?>"><?php the_field('site'); ?></a>
						</li>
					<?php endif; if($endereco): ?>
						<li class="endereco">
							<span class="icone"><i class="fa fa-map-marker"></i></span>
							<?php the_field('endereço'); ?>
						</li>
					<?php endif; ?>

					<li>
						<?php 
							if (get_field('vinculo_com_cupom') && is_array(get_field('vinculo_com_cupom'))) :
								$cupom = end(get_field('vinculo_com_cupom'));
								global $wpdb;

								$validar = $wpdb->get_row("
									SELECT COUNT(`id`) AS `total`
									  FROM `walpice_cda_codigos`
									 WHERE `cupom_id` = '{$cupom}'
									   AND `usado_em` IS NULL
								");

								$link = $validar->total > 0 && get_post_status($cupom) === 'publish' ? get_permalink($cupom) : 'javascript:;';
								$classe = $validar->total > 0 && get_post_status($cupom) === 'publish' ? '' : 'disabled';

						?>
								<a href="<?php echo $link; ?>" class="cupom-extra <?php echo $classe; ?>" target="_blank">CUPOM DESCONTO EXTRA</a>
						<?php
							endif;
						?>
					</li>
				</ul>
				<div class="clearfix"></div>				
			</li>
		</ul>
		
	</div>

</section>
<hr id="ver-descontos-aqui">


<ul class="share" id="redes-sociais">
	<?php get_template_part('includes/modules/module', 'social'); ?>
</ul>

<?php get_template_part('includes/modules/module', 'vantagens'); ?>


<div class="container">

		<div id="comentarios">
			<section class="titulo-com-faixas">
				<header>
					<h3><span>Localização</span></h3>
				</header>
				<div class="main">
					<?php $mapa = get_field('mapa'); 
						if($mapa):
							echo $mapa;
						endif;
					?>
				</div>
			</section>

		<!--<aside id="publicidades">
			<a href="#" target="_blank" title="">
				<img src="<?php echo IMG; ?>banner.png" alt="" title="">
			</a>
		</aside>-->
	</div>
	<?php get_template_part('includes/modules/module', 'parceiros-relacionados'); ?>