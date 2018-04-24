
<?php include ($config['path'] . '/views/partials/header.php'); ?>

<div class="container">
<div class="home-carousel">
	<div id="home-carousel" class="carousel slide" data-ride="carousel">
		<ol class="carousel-indicators">
			<li data-target="#home-carousel" data-slide-to="0" class="active"></li>
			<li data-target="#home-carousel" data-slide-to="1"></li>
			<li data-target="#home-carousel" data-slide-to="2"></li>
		</ol>
		<div class="carousel-inner" role="listbox">
			<div class="carousel-item active">
				<img src="<?=$config['public_url']?>/assets/img/01.jpg" alt="First slide">
				<div class="carousel-caption">
	    			<h3>Caption</h3>
	    			<p>Caption</p>
	  			</div>
			</div>
			<div class="carousel-item">
				<img src="<?=$config['public_url']?>/assets/img/02.jpg" alt="Second slide">
				<div class="carousel-caption">
	    			<h3>Caption</h3>
	    			<p>Caption</p>
	  			</div>
			</div>
			<div class="carousel-item">
				<img src="<?=$config['public_url']?>/assets/img/03.jpg" alt="Third slide">
				<div class="carousel-caption">
	    			<h3>Caption</h3>
	    			<p>Caption</p>
	  			</div>
			</div>
		</div>
		<a class="left carousel-control" href="#home-carousel" role="button" data-slide="prev">
			<span class="icon-prev" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="right carousel-control" href="#home-carousel" role="button" data-slide="next">
			<span class="icon-next" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
	</div>
</div>
</div>

<div class="content">
	<?php include ($config['path'] . '/views/partials/books.php'); ?>
</div>

<?php include ($config['path'] . '/views/partials/footer.php'); ?>
