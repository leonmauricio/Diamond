<?php include ($config['path'] . '/views/partials/header.php'); ?>

<div class="content">
	<div class="container">
		<form <?php if ($found): ?> action="<?=$config['public_url'] ?>/users/update" <?php else: ?> action="<?=$config['public_url'] ?>/users" <?php endif; ?> method="POST" id="users-store">
			<?php if ($found): ?>
				<input type="hidden" name="id" value="<?=$found['id']?>">
			<?php endif; ?>
			<div class="form-group">
				<label>Username</label>
				<input type="text" class="form-control" name="username" placeholder="Username" value="<?php if ($found){ echo $found['username']; } ?>">
			</div>
			<div class="form-group">
				<label>Password</label>
				<input type="password" class="form-control" name="password" placeholder="Password" value="">
			</div>
			<div class="form-group">
				<label>E-Mail</label>
				<input type="email" class="form-control" name="email" placeholder="E-Mail" value="<?php if ($found){ echo $found['email']; } ?>">
			</div>
			<div class="form-group">
				<label>Name</label>
				<input type="text" class="form-control" name="name" placeholder="Name" value="<?php if ($found){ echo $found['name']; } ?>">
			</div>
			<div class="form-group">
				<label>Surname</label>
				<input type="text" class="form-control" name="surname" placeholder="Surname" value="<?php if ($found){ echo $found['surname']; } ?>">
			</div>
			<button type="submit" class="btn btn-primary btn-lg">Enviar</button>
		</form>
	</div>
</div>

<?php include ($config['path'] . '/views/partials/footer.php'); ?>