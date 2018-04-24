<?php include ($config['path'] . '/views/partials/header.php'); ?>

<div class="content">
	<div class="container">
		<form <?php if ($found): ?> action="<?=$config['public_url'] ?>/authors/update" <?php else: ?> action="<?=$config['public_url'] ?>/authors" <?php endif; ?> method="POST" id="authors-store">
			<?php if ($found): ?>
				<input type="hidden" name="id" value="<?=$found['id']?>">
			<?php endif; ?>
			<div class="form-group">
				<label>Name</label>
				<input type="text" class="form-control" name="name" placeholder="Name" value="<?php if ($found){ echo $found['name']; } ?>">
			</div>
			<div class="form-group">
				<label>Surname</label>
				<input type="text" class="form-control" name="surname" placeholder="Surname" value="<?php if ($found){ echo $found['surname']; } ?>">
			</div>
			<div class="form-group">
				<label>Image URL</label>
				<input type="text" class="form-control" name="image" placeholder="Image url" value="<?php if ($found){ echo $found['image'];}?>">
			</div>
			<div class="form-group">
				<label>Bio</label>
				<textarea class="form-control" name="bio" placeholder="Bio" rows="3"><?php if ($found){ echo $found['bio']; } ?></textarea>
			</div>
			<button type="submit" class="btn btn-primary btn-lg">Enviar</button>
		</form>
	</div>
</div>

<?php include ($config['path'] . '/views/partials/footer.php'); ?>