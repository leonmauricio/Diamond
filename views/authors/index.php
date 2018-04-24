<?php include ($config['path'] . '/views/partials/header.php'); ?>

<div class="content">
	<div class="container">
		<?php foreach(array_chunk($authors, 3) as $key => $row):?>
			<div class="row">
				<?php foreach($row as $author):?>
					<div class="col-md-4">
						<div class="card">
							<img class="card-img-top img-fluid" src="<?=$config['public_url']?>/assets/<?=$author["image"]?>">
							<div class="card-block">
								<a href="author?id=<?=$author["id"]?>">
									<h3 class="card-title">
										<?=$author["name"]?>
										<?=$author["surname"]?>
									</h3>
								</a>
								<p class="card-text">
									<?=$author["bio"]?>
								</p>
							</div>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		<?php endforeach; ?>
	</div>
</div>

<?php include ($config['path'] . '/views/partials/footer.php'); ?>