<form class="hidden-xs pesquisador" action="<?php echo home_url(); ?>" method="GET">
	<input type="text" value="<?php echo isset($_GET['s']) ? $_GET['s'] : ''; ?>" required placeholder="Digite o que está procurando" name="s">
	<button type="submit">
		<i class="fa fa-search"></i>
	</button>
</form>