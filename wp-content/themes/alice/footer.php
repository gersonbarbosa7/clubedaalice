		<?php 
			get_template_part('includes/modules/module', 'banner-footer');
			//get_template_part('includes/modules/module', 'midia');
		?>
	<!--container-->
	</div>
</main>
	<footer>
		<div id="footer-top">
			<div class="container">
				<div class="row">
					<div id="menus-do-rodape">
						<section class="titulo-com-faixas">
							<div class="main">
								<?php 
									wp_nav_menu(array(
										'menu' => 'institucional',
										'menu_class' => 'menu-rodape',
										'container' => 'nav',
										'theme_location' => 'institucional'
									));
								?>
							</div>
						</section>
					</div>
				</div>
			</div>
			
		</div>
		<div id="footer-bottom">
			<div class="container">
				<div class="row">
					<a href="index.php" id="logo-rodape" title="">
						<img src="<?php echo IMG; ?>logo-rodape.png" alt="" title="">
					</a>
					<div id="description">
						<?php the_field('descricao', 'options'); ?>
					</div>
					<?php get_template_part('includes/modules/module', 'social-icons'); ?>
				</div>
			</div>
		</div>
		<div id="copyright">
			<div class="container">
				<div class="content">
					© <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. Todos os Direitos reservados
					<a href="https://plug.ag/" id="developed-by" target="_blank" title="Plug! - Design &amp; Desenvolvimento estratégico">
						<img src="https://plug.ag/plug-logo-cores.png" width="190" class="pull-right" alt="Plug! - Design &amp; Desenvolvimento estratégico" title="Plug! - Design &amp; Desenvolvimento estratégico">
					</a>
				</div>
			</div>
		</div>	
	</footer>


<?php 
        get_template_part('includes/modules/module', 'modals');
        //get_template_part('includes/modules/module', 'midia');
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/mascaras.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/functions.js"></script>
	<?php 
		wp_footer();
	?>			
	<!--<script>
		jQuery(function(){
			// efeito pinterest	 
			var jQuerycontainer = jQuery('.grid');
				jQuerycontainer.imagesLoaded( function() {
				jQuerycontainer.masonry({
				  itemSelector        : '.grid-item',
				  columnWidth         : '.grid-item',
				  transitionDuration  : 0
				});
			});
		});

		// google analytics
		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

		ga('create', 'UA-73896807-1', 'auto');
		ga('send', 'pageview');	

		// facebook pixel code
		!function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
		n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
		n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
		t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
		document,'script','https://connect.facebook.net/en_US/fbevents.js');
		fbq('init', '1859045827708335');
		fbq('track', 'PageView');
	</script>-->
	<!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script> -->
	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/vendor/jquery-sticky/jquery.sticky.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			<?php if(is_user_logged_in()) : ?>
		    	$(".menu-principal").sticky({topSpacing:32});
		    <?php else: ?>
		    	$(".menu-principal").sticky({topSpacing:0});
		    <?php endif; ?>
		    if ($(window).width() <= 768) {
		    	<?php if(is_user_logged_in()) : ?>
		    		$("#top-bar").sticky({topSpacing:0});
		    	 <?php else: ?>
			    	$("#top-bar").sticky({topSpacing:0});
			    <?php endif; ?>
		    }
                    
                    <?php if (is_page('11261')){ ?>
                    //Se digitar Enter
                            $(document).keypress(function (e) {
                            if (e.which == 13) {
                                prepararCheckout();
                            }
                        });
                    <?php } ?>
                    
     
                    
		});

		$(window).resize(function() {
			if ($(window).width() <= 768) {
				<?php if(is_user_logged_in()) : ?>
		    		$("#top-bar").sticky({topSpacing:0});
		    	<?php else: ?>
			    	$("#top-bar").sticky({topSpacing:0});
			    <?php endif; ?>
		    }
		});    
                
                

	</script>
</body>
</html>