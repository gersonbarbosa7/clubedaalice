<div class="item">
	<a href="<?php echo get_sub_field('link'); ?>" title="<?php the_title(); ?>">
		<?php 
			$banner_responsivo = get_sub_field('banner_responsivo');
			if($banner_responsivo): 
		?>
			<div class="hidden-xs">
				<img src="<?php echo get_sub_field('imagem'); ?>" title="<?php the_title(); ?>" alt="<?php the_title(); ?>">
			</div>		
			<div class="visible-xs">
				<img src="<?php echo $banner_responsivo; ?>" title="<?php the_title(); ?>" alt="<?php the_title(); ?>">
			</div>
		<?php else : ?>
			<img src="<?php echo get_sub_field('imagem'); ?>" title="<?php the_title(); ?>" alt="<?php the_title(); ?>">
		<?php endif; ?>
	</a>
</div>