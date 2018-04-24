<?php include ($config['path'] . '/views/partials/header.php'); ?>

<div class="content">
	<div class="container">
		<form action="contact-form" method="POST" id="contact-form">
			<div class="form-group">
				<input type="text" class="form-control" name="name" placeholder="Name">
			</div>
			<div class="form-group">
				<input type="text" class="form-control" name="email" placeholder="E-Mail">
			</div>
			<div class="form-group">
				<input type="text" class="form-control" name="phone" placeholder="Phone Number">
			</div>
			<div class="form-group">
				<textarea class="form-control" name="comment" placeholder="Comment" rows="3"></textarea>
			</div>
			<button type="submit" class="btn btn-primary btn-lg">Enviar</button>
		</form>
	</div>
</div>

<?php include ($config['path'] . '/views/partials/footer.php'); ?>