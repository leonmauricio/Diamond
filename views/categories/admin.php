<?php include ($config['path'] . '/views/partials/header.php'); ?>

<div class="container">	

	<div class="content">

		<a href="<?=$config['public_url']?>/categories/create" class="btn btn-success">Create Category</a>

		<hr>

		<ul class="admin-list">
			
			<?php foreach ($categories as $category): ?>

				<li>
					<div>
						<a href="<?=$config['public_url']?>/category?id=<?=$category['id']?>"><?=$category['name']?></a>
					</div>
					<button type="button" class="btn btn-danger delete-category" data-id='<?=$category['id']?>'>Delete</button>
					<a href="<?=$config['public_url']?>/categories/update?id=<?=$category["id"]?>" class="btn btn-primary">Edit</a>
				</li>

			<?php endforeach ?>

		</ul>

	</div>
</div>

<?php include ($config['path'] . '/views/partials/footer.php'); ?>