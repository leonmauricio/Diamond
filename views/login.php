<?php include ($config['path'] . '/views/partials/header.php'); ?>

<div class="content">
	<div class="container">
		<form action="login" method="POST" id="login">
			<div class="form-group">
				<input type="text" class="form-control" name="username" placeholder="Usuario">
			</div>
			<div class="form-group">
				<input type="password" class="form-control" name="password" placeholder="Clave">
			</div>
			<button type="submit" class="btn btn-primary btn-lg">
				Ingresar
			</button>
		</form>
	</div>
</div>

<?php include ($config['path'] . '/views/partials/footer.php'); ?>