<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
	<meta name="google-site-verification" content="o8Yan04vWOF0mi_yuh4TuW-nlc6yNKTUFkmfjor8XVE" />
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<script>
	  window.fbAsyncInit = function() {
	    FB.init({
	      appId      : '1693026067645807',
	      xfbml      : true,
	      version    : 'v2.6'
	    });
	  };

	  (function(d, s, id){
	     var js, fjs = d.getElementsByTagName(s)[0];
	     if (d.getElementById(id)) {return;}
	     js = d.createElement(s); js.id = id;
	     js.src = "//connect.facebook.net/pt_BR/sdk.js";
	     fjs.parentNode.insertBefore(js, fjs);
	   }(document, 'script', 'facebook-jssdk'));
	</script>

	<div id="fb-root"></div>	
	<script>(function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0];
	  if (d.getElementById(id)) return;
	  js = d.createElement(s); js.id = id;
	  js.src = "//connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v2.5";
	  fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));</script>

	<?php 
		get_template_part('includes/modules/module', 'top-bar'); 
	?>
	<header>
		<div class="container">
			<div class="row">	
				<div class="hidden-xs">
					<?php get_template_part('includes/modules/module', 'social-icons'); ?>			
				</div>			

				<a href="<?php echo home_url(); ?>" id="logo" title="<?php bloginfo('name'); ?>">
					<img src="<?php echo IMG; ?>logo-clube-da-alice.png" alt="<?php bloginfo('name'); ?>" title="<?php bloginfo('name'); ?>">
				</a>

				<div class="descontos-topo visible-xs">
					<a href="<?php bloginfo('url'); ?>/descontos">
						<img src="<?php bloginfo('template_directory'); ?>/images/descontos.png" alt="Descontos">
					</a>
				</div>

				<a class="bottom hidden-xs hidden-sm" target="_blank" href="http://carteirinha.clubedaalice.com.br/">
					<div class="chamada">
						<h2>Vem pro</h2>
						<p>Clube!</p>
					</div>
					<div class="imagem">
						<img src="<?php echo IMG; ?>alice-bottom.png" alt="Clube Secreto">	
					</div>					
				</a>
			</div>
		</div>
	</header>
	<?php 
		if (is_singular('post') || ((is_category() || is_archive()) && !is_tax('categoria_da_empresa')) || is_page('blog')) {
			get_template_part('includes/modules/module', 'menu-blog');
		}
		else {
			get_template_part('includes/modules/module', 'menu');
		}
	?>
	<main role="main">
		<div class="container">
