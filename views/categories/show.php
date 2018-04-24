<?php include ($config['path'] . '/views/partials/header.php'); ?>

<div class="content">
	<div class="container">
		<div class="card card-block">
			<div class="media">
				<div class="media-body">
					<h4 class="media-heading">
						<?=$category["name"]?>
					</h4>
				</div>
			</div>
		</div>
	</div>
	<?php include ($config['path'] . '/views/partials/books.php'); ?>
</div>


<?php include ($config['path'] . '/views/partials/footer.php'); ?>