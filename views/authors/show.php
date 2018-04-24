
<?php include ($config['path'] . '/views/partials/header.php'); ?>

<div class="content">
	<div class="container">
		<div class="card card-block">
			<div class="media">
				<a class="media-left" href="#">
					<img class="media-object img-circle img-author" src="<?=$config['public_url']?>/assets/<?=$author["image"]?>">
				</a>
				<div class="media-body">
					<h4 class="media-heading">
						<?=$author["name"]?>
						<?=$author["surname"]?>
					</h4>
					<p>
						<?=$author["bio"]?>
					</p>
				</div>
			</div>
		</div>
	</div>
	<?php include ($config['path'] . '/views/partials/books.php'); ?>
</div>

<?php include ($config['path'] . '/views/partials/footer.php'); ?>