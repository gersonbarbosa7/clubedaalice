<!--container-->
</div>
<?php 
	global $post;
	$url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
	$capa_da_postagem = get_field('capa_da_postagem');
?>
<section id="interna-subheader" style="background-image: url('<?php echo $capa_da_postagem; ?>');">
	<div class="tarja"></div>
	<header class="container">
		<div class="post-categories">
			<?php 
				$category = get_the_category();
			?>
			<a href="<?php echo get_term_link($category[0], $category[0]->slug); ?>" title="<?php echo $category[0]->cat_name; ?>">
				<?php
					echo $category[0]->cat_name;
				?>
			</a>
		</div>
		<hgroup>
			<h2>
				<?php the_title(); ?>
			</h2>
			<hr>
		</hgroup>
	</header>
	<footer class="container">
		<div class="footer-content">
			<div class="post-info">
				<div class="hidden">
					<?php
						echo get_avatar( get_the_author_meta('ID'), 52, null, get_the_author()); 
						the_author();
					?>
				</div>
				<time><i class="fa fa-calendar"></i> <?php the_date('d/m/Y'); ?></time>

				<span class="views">
					<i class="fa fa-eye"></i> <?php echo getPostViews(get_the_ID()); ?>
				</span>
			</div>
		</div>
	</footer>
</section>
<div class="container">
	<?php get_template_part('includes/modules/module', 'banner'); ?>
	<div id="content-page">
		<div id="posts">
			<div class="main">
				<article class="post">	
					<div class="post-content">
						<?php the_content(); ?>
					</div>
				
					<header class="hidden">
						<?php if($url): ?>
							<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
								<img src="<?php echo $url; ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>">
							</a>
						<?php else :  ?>
							<img src="<?php bloginfo('template_directory'); ?>/images/thumbnail-clube-da-alice.jpg" alt="Thumbnail Clube da Alice">
						<?php endif; ?>
					</header>
					<!-- post thumb -->


					<footer>
						<div id="tags">
							<?php the_tags( $before, $sep, $after ); ?> 
						</div>
						<section class="titulo-com-faixas">
							<header>
								<h3><span>COMPARTILHE</span></h3>								
							</header>
							<div class="main">
								<ul class="share">
									<?php get_template_part('includes/modules/module', 'share'); ?>
								</ul>
							</div>
						</section>
						<section class="titulo-com-faixas hidden">
							<header>								
								<h3><span>SOBRE A COLUNISTA</span></h3>								
							</header>
							<div class="hidden main" id="box-autor">
								<figure>
									<?php echo get_avatar( get_the_author_meta('ID'), 105, null, get_the_author());  ?>
								</figure>
								<hgroup id="autor">
									<h3><span><?php the_author(); ?></span></h3>
									<h5>
										<?php the_author_meta('description'); ?>
									</h5>
								</hgroup>
								<div class="clearfix"></div>
							</div>
						</section>
						<section class="titulo-com-faixas">
							<header>								
								<h3><span>ENVIE SEU COMENTÁRIO</span></h3>								
							</header>
							<div class="main">
								<div class="fb-comments" data-href="<?php the_permalink(); ?>" data-numposts="3"></div>
							</div>
						</section>
					</footer>
				</article>
			</div>
		</div>
		<?php get_sidebar('post'); ?>
	</div>