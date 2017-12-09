<?php 
	global $post;
	$url = wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'destaque' );
?>
<div class="destaque">
	<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="box-thumb">

		<img src="<?php echo $url; ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>">

		<div class="logo">
			<img src="<?php the_field('logo'); ?>" title="<?php the_title(); ?>" alt="<?php the_title(); ?>">
		</div>
	</a>
	<div class="box-content">
		<hgroup>
			<h3>
				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" >
					<?php the_title(); ?>
				</a>
			</h3>
			<h5>
				<?php echo substr(strip_tags(get_the_content()), 0, 100) . '[...]'; ?>
			</h5>
		</hgroup>
		<ul id="dados-de-contato">
			<li>
				<span class="icone"><i class="fa fa-envelope"></i></span>
				<div class="dados">
					<a href="mailto:<?php the_field('email'); ?>" title="Fale conosco"><?php the_field('email'); ?></a>
				</div>
			</li>
			<li>
				<span class="icone"><i class="fa fa-phone"></i></span>
				<address>
					<div class="dados">
						<?php the_field('telefones'); ?>
					</div>
				</address>
			</li>
			<li>
				<span class="icone"><i class="fa fa-map-marker"></i></span>
				<div class="dados">
					<?php the_field('endereço'); ?>
				</div>
			</li>
		</ul>
		<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="read-more">
			VEJA AS VANTAGENS DAS ALICES <i class="fa fa-arrow-circle-right"></i>
		</a>
	</div>
</div>