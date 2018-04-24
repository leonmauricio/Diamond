
<p>
	Orden de compra por los siguientes productos:
</p>

<?php foreach ($books as $book): ?>
	<li>
		<div>
			<a href="<?=$config['public_url']?>/book?id=<?=$book['id']?>"><?=$book['name']?></a>
		</div>
	</li>
<?php endforeach ?>

<p>
	Datos del usuario:
</p>

<ul>
	<?=$user['name']?> <?=$user['surname']?> (<?=$user['email']?>)
</ul>