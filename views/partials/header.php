<!DOCTYPE html>
<html>
<head>
	<title>Diamond</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.4/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?=$config['public_url']?>/assets/css/style.css">
	<link rel="stylesheet" href="<?=$config['public_url']?>/assets/css/font-awesome.min.css">
</head>
<body>

	<nav class="navbar navbar-fixed-top navbar-dark bg-inverse">
		<div class="container">		
			<a class="navbar-brand" href="/">
				Diamond
			</a>
			<ul class="nav navbar-nav">
				<li class="nav-item active">
					<a class="nav-link" href="<?=$config['public_url']?>/">Home</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?=$config['public_url']?>/books">Books</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?=$config['public_url']?>/authors">Authors</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?=$config['public_url']?>/categories">Categories</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?=$config['public_url']?>/contact-form">Contact</a>
				</li>
			</ul>
			<ul class="nav navbar-nav pull-right">
				<li class="nav-item">
					<a class="nav-link" href="<?=$config['public_url']?>/cart">
						<i class="fa fa-shopping-cart"></i> 
						Cart
						<?=count($cart)?>
					</a>
				</li>
				<?php if ($session): ?>

					<li class="nav-item">
						<div class="dropdown">
							<a class="btn btn-secondary dropdown-toggle" href="https://example.com" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<?=$_SESSION['user']['username']?>
							</a>

							<div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
							<a class="dropdown-item" href="<?=$config['public_url']?>/user">Account</a>
							<a class="dropdown-item" href="<?=$config['public_url']?>/logout">Log Out</a>
							</div>
						</div>
					</li>

				<?php else: ?>

					<li class="nav-item">
						<a class="nav-link" href="<?=$config['public_url']?>/users/create">Sign Up</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?=$config['public_url']?>/login">Log In</a>
					</li>

				<?php endif; ?>
			</ul>
		</div>
	</nav>