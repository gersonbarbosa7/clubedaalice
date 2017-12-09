<?php 
	global $evento, $i;

	$post = get_post($evento->post_id);
?>
<li <?php echo $i === 1 ? 'class="active"' : ''; ?>>
	<a data-toggle="tab" href="#evento-<?php echo $i;?>" title="<?php echo $post->post_title; ?>">
		<span class="number">
			<?php echo date('d', strtotime($evento->meta_value)); ?>
		</span>
		<div class="mes"><?php echo strtoupper(nomedoMes(date('m', strtotime($evento->meta_value)))); ?></div>
		<span class="seta"></span>
	</a>
</li>