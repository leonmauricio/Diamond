<?php include ($config['path'] . '/views/partials/header.php'); ?>

<div class="container">	

	<div class="content">

		<a href="<?=$config['public_url']?>/users/create" class="btn btn-success">Create Users</a>

		<hr>

		<ul class="admin-list">
			
			<?php foreach ($users as $user): ?>

				<li>
					<div>
						<a href="<?=$config['public_url']?>/user?id=<?=$user['id']?>"><?=$user['username']?></a>
					</div>
					<button type="button" class="btn btn-danger delete-user" data-id='<?=$user['id']?>'>Delete</button>
					<a href="<?=$config['public_url']?>/users/update?id=<?=$user["id"]?>" class="btn btn-primary">Edit</a>
				</li>

			<?php endforeach ?>

		</ul>

	</div>
</div>

<?php include ($config['path'] . '/views/partials/footer.php'); ?>