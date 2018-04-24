<?php include ($config['path'] . '/views/partials/header.php'); ?>

<div class="container">	

	<div class="content">

		<a href="<?=$config['public_url']?>/books/create" class="btn btn-success">Create Book</a>

		<hr>

		<ul class="admin-list">
			
			<?php foreach ($books as $book): ?>

				<li>
					<div>
						<a href="<?=$config['public_url']?>/book?id=<?=$book['id']?>"><?=$book['name']?></a>
					</div>
					<button type="button" class="btn btn-danger delete-book" data-id='<?=$book['id']?>'>Delete</button>
					<a href="<?=$config['public_url']?>/books/update?id=<?=$book["id"]?>" class="btn btn-primary">Edit</a>
				</li>

			<?php endforeach ?>

		</ul>

	</div>
</div>

<?php include ($config['path'] . '/views/partials/footer.php'); ?>