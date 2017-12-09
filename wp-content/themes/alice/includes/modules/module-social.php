<li>
	<h5><i class="fa fa-info-circle"></i> Nossas <strong>Redes Sociais:</h5>
</li>
<div class="clearfix"></div>

<?php 
	$facebook = get_field('facebook');
	$twitter = get_field('twitter');
	$youtube = get_field('youtube');
	$instagram = get_field('instagram');
	$google = get_field('google_pluss');
	$pinterest = get_field('pinterest');
	if($facebook):
?>
<li>
	<a href="<?php echo $facebook; ?>" title="Siga-nos no Facebook" target="_blank">
		<i class="fa fa-facebook"></i>
	</a>
</li>
<?php endif; if($youtube): ?>
<li>
	<a href="<?php echo $youtube; ?>" title="Siga-nos no Twitter" target="_blank">
		<i class="fa fa-youtube"></i>
	</a>
</li>
<?php endif; if($twitter): ?>
<li>
	<a href="<?php echo $twitter; ?>" title="Siga-nos no Twitter" target="_blank">
		<i class="fa fa-twitter"></i>
	</a>
</li>
<?php endif; if($google): ?>
<li>
	<a href="<?php echo $google; ?>" title="Siga-nos no Google Plus" target="_blank">
		<i class="fa fa-google-plus"></i>
	</a>
</li>
<?php endif; if($pinterest): ?>
<li>
	<a href="<?php echo $pinterest; ?>" title="Siga-nos no Pinterest" target="_blank">
		<i class="fa fa-pinterest"></i>
	</a>
</li>
<?php endif; if($instagram): ?>
<li>
	<a href="<?php echo $instagram; ?>" title="Siga-nos no Instagram" target="_blank">
		<i class="fa fa-instagram"></i>
	</a>
</li>
<?php endif; ?>