<?php include ($config['path'] . '/views/partials/header.php'); ?>

<div class="content">
	<div class="container">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="/">Home</a></li>
			<li class="breadcrumb-item"><a href="category?id=<?=$book["categories_id"]?>"><?=$book["categories_name"]?></a></li>
			<li class="breadcrumb-item active"><?=$book["name"]?></li>
		</ol>
		<div class="row">
			<div class="col-md-3">
				<img src="<?=$config['public_url']?>/assets/<?=$book["image"]?>" class="img-fluid">
			</div>
			<div class="col-md-6">
				<h4>
					<?=$book["name"]?>
				</h4>
				<h5>
					<a href="author?id=<?=$book["authors_id"]?>">
						<?=shortname($book["authors_name"], $book["authors_surname"])?>
					</a>
				</h5>
				<a href="category?id=<?=$book["categories_id"]?>" class="tag tag-pill tag-primary" style="background-color: <?=$book["categories_color"]?>">
					<?=$book["categories_name"]?>
				</a>
				<div class="card-text">
					<div>					
						Rating:
						<?php for ($i = 0; $i < $book["rating"]; $i++):?>
							<i class="fa fa-star"></i>
						<?php endfor; ?>
					</div>
					<p>
						<strong>Overview: </strong>
						<br>
						<?=$book["description"]?>
					</p>
				</div>
			</div>
			<div class="col-md-3">
				<h5>
					<strong>
						$ <?=discount($book["price"], isset($book["discount"])? $book["discount"] : 0)?>
					</strong>
				</h5>
				<a href="cart/add?id=<?=$book['id']?>" class="btn btn-primary btn-lg btn-block">Buy Now</a>
				<a href="#order" class="btn btn-secondary btn-lg btn-block">Add to Wishlist</a>
			</div>
		</div>
	</div>
</div>

<?php include ($config['path'] . '/views/partials/footer.php'); ?>