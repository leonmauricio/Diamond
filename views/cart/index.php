<?php include ($config['path'] . '/views/partials/header.php'); ?>

<div class="container">	
	<div class="content">

	<?php if (empty($books)): ?>

		no tenes nada gato

	<?php else: ?>

		<ul class="cart-list">
			<?php foreach ($books as $index => $book): ?>
				<li>
					<div>
						<a href="<?=$config['public_url']?>/book?id=<?=$book['id']?>"><?=$book['name']?></a>
					</div>
					<button type="button" class="btn btn-danger delete-from-cart" data-id='<?=$index?>'>Delete</button>
				</li>
			<?php endforeach ?>
		</ul>
	<?php endif; ?>

	<?php if ($session): ?>

		<form method="POST" action="orders" id="order-store">
			<input type="hidden" name="user_id" value="<?=$_SESSION['user']['id']?>">
			<?php foreach ($books as $book): ?>
				<input type="hidden" name="products[]" value="<?=$book['id']?>">
			<?php endforeach ?>
			<button class="btn btn-primary">
				Checkout
			</button>
		</form>

	<?php else: ?>

		<p>
			Para completar tu compra <a href="users/create">Registrate</a> o <a href="login">Ingresa a tu cuenta</a>
		</p>

	<?php endif; ?>

	</div>
</div>

<?php include ($config['path'] . '/views/partials/footer.php'); ?>