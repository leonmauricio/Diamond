<?php include ($config['path'] . '/views/partials/header.php'); ?>

<div class="content">
	<div class="container">
		<?php foreach(array_chunk($categories, 3) as $key => $row):?>
			<div class="row">
				<?php foreach($row as $category):?>
					<div class="col-md-4">
						<div class="card">
							<div class="card-block">
								<a href="category?id=<?=$category["id"]?>">
									<h3 class="card-title">
										<?=$category["name"]?>
									</h3>
								</a>
							</div>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		<?php endforeach; ?>
	</div>
</div>

<?php include ($config['path'] . '/views/partials/footer.php'); ?>