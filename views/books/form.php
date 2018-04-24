<?php include ($config['path'] . '/views/partials/header.php'); ?>

<div class="content">
	<div class="container">
		<form <?php if ($found): ?> action="<?=$config['public_url'] ?>/books/update" <?php else: ?> action="<?=$config['public_url'] ?>/books" <?php endif; ?> method="POST" id="book-store">
			<?php if ($found): ?>
				<input type="hidden" name="id" value="<?=$found['id']?>">
			<?php endif; ?>
			<div class="form-group">
				<label>Name</label>
				<input type="text" class="form-control" name="name" placeholder="Name" value="<?php if ($found){ echo $found['name']; } ?>">
			</div>
			<div class="form-group">
				<label>Author</label>
				<select class="custom-select" name="author_id">
					<option value="">
						Select Author
					</option>
					<?php foreach ($authors as $author): ?>
						<?php if ($found && $found['author_id'] === $author['id']): ?>
							<option selected value="<?=$author['id']?>">
						<?php else: ?>
							<option value="<?=$author['id']?>">
						<?php endif; ?>
								<?=$author['name']?> <?=$author['surname']?>
							</option>
					<?php endforeach ?>
				</select>
			</div>
			<div class="form-group">
				<label>Category</label>
				<select class="custom-select" name="category_id">
					<option value="">
						Select Category
					</option>
					<?php foreach ($categories as $category): ?>
						<?php if ($found && $found['category_id'] == $category['id']): ?>
							<option selected value="<?=$category['id']?>">
						<?php else: ?>
							<option value="<?=$category['id']?>">
						<?php endif; ?>
							<?=$category['name']?>
						</option>
					<?php endforeach ?>
				</select>
			</div>
			<div class="form-group">
				<label>Price</label>
				<input type="text" class="form-control" name="price" placeholder="Price" value="<?php if ($found){ echo $found['price'];}?>">
			</div>
			<div class="form-group">
				<label>Rating</label>
				<select class="custom-select" name="rating">
					<option value="">
						Select Rating
					</option>
					<?php for ($i=1; $i <= 5; $i++):?>
						<?php if ($found && $found['rating'] == $i): ?>
							<option selected value="<?=$i?>">
						<?php else: ?>
							<option value="<?=$i?>">
						<?php endif; ?>
							<?=$i?>
						</option>
					<?php endfor; ?>
				</select>
			</div>
			<div class="form-group">
				<label>Description</label>
				<textarea class="form-control" name="description" placeholder="Description" rows="3"><?php if ($found){ echo $found['description']; } ?></textarea>
			</div>
			<div class="form-group">
				<label>Year</label>
				<input type="text" class="form-control" name="year" placeholder="Year"  value="<?php if ($found){ echo $found['year'];}?>">
			</div>
			<div class="form-check">
				<label class="form-check-label">
				<input class="form-check-input" type="checkbox" value="1" name="featured" <?php if ($found && $found['featured']): ?> checked <?php endif; ?>>
					Featured
				</label>
			</div>
			<div class="form-group">
				<label>Discount</label>
				<input type="text" class="form-control" name="discount" placeholder="Discount"  value="<?php if ($found){ echo $found['discount'];}?>">
			</div>
			<div class="form-group">
				<label>Image URL</label>
				<input type="text" class="form-control" name="image" placeholder="Image url" value="<?php if ($found){ echo $found['image'];}?>">
			</div>
			<button type="submit" class="btn btn-primary btn-lg">Enviar</button>
		</form>
	</div>
</div>

<?php include ($config['path'] . '/views/partials/footer.php'); ?>