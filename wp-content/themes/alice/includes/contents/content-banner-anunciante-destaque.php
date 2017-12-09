<?php $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) ); ?>
<?php if ( have_rows('slide_destaque', $term) ): ?>
	<ul id="banner_destaque" class="owl-carousel owl-theme">		
		<?php while ( have_rows('slide_destaque', $term) ) : the_row();
			$img = get_sub_field('banner', $term);
			$link = get_sub_field('link_do_banner', $term);
			$banner_responsivo = get_sub_field('banner_responsivo', $term);
			if($banner_responsivo):
		?>
			<li class="item">
				<div class="hidden-xs">
					<a href="<?php echo $link; ?>">
						<img src="<?php echo $img; ?>" />
					</a>
				</div>

				<div class="visible-xs">		
					<a href="<?php echo $link; ?>">
						<img src="<?php echo $banner_responsivo; ?>" />
					</a>					
				</div>
			</li>
			<?php else : ?>
				<li class="item">
					<a href="<?php echo $link; ?>">
						<img src="<?php echo $img; ?>" />
					</a>
				</li>
			<?php endif; ?>				
		<?php endwhile; ?>
	</ul>
<?php endif; ?>