<?php include ($config['path'] . '/views/partials/header.php'); ?>

<div class="container">	

	<div class="content">

		<a href="<?=$config['public_url']?>/authors/create" class="btn btn-success">Create Category</a>

		<hr>

		<ul class="admin-list">
			
			<?php foreach ($authors as $author): ?>

				<li>
					<div>
						<a href="<?=$config['public_url']?>/author?id=<?=$author['id']?>"><?=$author['name']?></a>
					</div>
					<button type="button" class="btn btn-danger delete-author" data-id='<?=$author['id']?>'>Delete</button>
					<a href="<?=$config['public_url']?>/authors/update?id=<?=$author["id"]?>" class="btn btn-primary">Edit</a>
				</li>

			<?php endforeach ?>

		</ul>

	</div>
</div>

<?php include ($config['path'] . '/views/partials/footer.php'); ?>