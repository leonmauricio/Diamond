
	<div class="container">
		<?php foreach($books as $key => $row):?>
			<div class="row">
				<?php foreach($row as $book):?>
					<div class="col-md-3">
						<div class="card">
							<div class="cover" style="background-image: url(<?=$config['public_url']?>/assets/<?=$book["image"]?>)"></div>
							<div class="card-block">
								<h3 class="card-title">
									<a href="book?id=<?=$book["id"]?>">
										<?=$book["name"]?>
									</a>
								</h3>
								<h5>
									<a href="author?id=<?=$book["authors_id"]?>">
										<?=shortname($book["authors_name"], $book["authors_surname"])?>
									</a>
								</h5>
								<a href="category?id=<?=$book["categories_id"]?>" class="tag tag-pill tag-primary" style="background-color: <?=$book["categories_color"]?>">
									<?=$book["categories_name"]?>
								</a>
								<p class="card-text">
									<?=$book["description"]?>
								</p>
								<h5>
									<strong>
										$ <?=discount($book["price"], isset($book["discount"])? $book["discount"] : 0)?>
									</strong>
								</h5>
								<a href="#order" class="btn btn-primary">Comprar</a>
							</div>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		<?php endforeach; ?>
	</div>
