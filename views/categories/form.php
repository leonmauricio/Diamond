<?php include ($config['path'] . '/views/partials/header.php'); ?>

<div class="content">
	<div class="container">
		<form <?php if ($found): ?> action="<?=$config['public_url'] ?>/categories/update" <?php else: ?> action="<?=$config['public_url'] ?>/categories" <?php endif; ?> method="POST" id="categories-store">
			<?php if ($found): ?>
				<input type="hidden" name="id" value="<?=$found['id']?>">
			<?php endif; ?>
			<div class="form-group">
				<label>Name</label>
				<input type="text" class="form-control" name="name" placeholder="Name" value="<?php if ($found){ echo $found['name']; } ?>">
			</div>
			<div class="form-group">
				<label>Color</label>
				<input type="text" class="form-control" name="color" placeholder="Color" value="<?php if ($found){ echo $found['color']; } ?>">
			</div>
			<button type="submit" class="btn btn-primary btn-lg">Enviar</button>
		</form>
	</div>
</div>

<?php include ($config['path'] . '/views/partials/footer.php'); ?>