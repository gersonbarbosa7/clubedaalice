<?php
get_header();
	global $post, $category;
	$category = wp_get_post_terms($post->ID, 'categoria_da_empresa');
	$galeria = get_field('galeria');
?>
<!--container-->
</div>
<?php
if (get_field('capa')):
?>
<div class="thumb-destaque">
	<?php /* if($galeria): ?>
		<div class="fumaca hidden-xs"></div>
	<?php endif; */ ?>
	<img id="destaque-parceiro" src="<?php the_field('capa'); ?>" title="<?php the_title(); ?>" alt="<?php the_title(); ?>">
</div>
<?php
endif;
?>
<input type="hidden" name="cupomid" id="cupomId" value="<?php echo get_the_ID()?>">
<div class="container">
	<div class="row">
		<div class="container-cupom azul">
	    	<h1><strong><?php echo get_the_title()?></strong></h1>
	    </div>
	    <div class="container-cupom azul-escuro">
	    	Cupom Promocional
	    </div>
		<div class="container-cupom">
			<h2><?php echo the_field('titulo_cupom_2');?></h2>
			<div class="conteudo">
				<?php the_content(); ?>
			</div>
		</div>
		<div class="container-cupom branco">
			<p class="title">Informações Importantes</p>
			<?php echo the_field('texto_legal_cupom');?>
		</div>
		<div class="container-cupom azul">
			<a class="link-face" href="#">
				Retire seu cupom com o Facebook
			</a>
			<div class="message" style="display: none;">
			</div>
			<!-- Parte 2 -->
			<form action="#" class="form form-dados" style="display: none" >

				<!-- <p>Revise seus dados.</p>
				<p>O e-mail abaixo é o que você mais utiliza? Caso não, altere-o.</p> -->
				<p>Confirme seus dados do Facebook.</p>

				<input type="hidden" name="cda_cupom_fbid" id="cda_cupom_fbid" value="">
				<div class="form-group">
					<div class="form-item">
						<input class="form-control" id="cda_cupom_nome" name="cda_cupom_nome" type="text" required disabled>
						<label class="label-float" for="cda_cupom_nome">Nome</label>
					</div>
					<div class="form-item">
						<input class="form-control" id="cda_cupom_sobrenome" name="cda_cupom_sobrenome" type="text" required disabled>
						<label class="label-float" for="cda_cupom_sobrenome">Sobrenome</label>
					</div>
					<div class="form-item">
						<input class="form-control" id="cda_cupom_email" name="cda_cupom_email" type="text" required disabled>
						<label class="label-float" for="cda_cupom_email">E-mail</label>
					</div>

					<p>O Email abaixo é o que você mais utliza? Caso não, informe o seu melhor email.</p>

					<div class="form-item email-preferencial">
						<input class="form-control" id="cda_cupom_email_preferencial" name="cda_cupom_email_preferencial" type="text" required>
						<label class="label-float" for="cda_cupom_email_preferencial">Seu melhor E-mail</label>
					</div>
					<button type="button" class="btn-cadastrar">Obter cupom</button>
				</div>
			</form>
		</div>
		<div class="container-cupom-numero" style="display: none;">
		</div>
	</div>
	<script>
		var ajaxurl = "<?php echo admin_url('admin-ajax.php'); ?>";
	</script>
	<?php
	get_footer();
