

<?=$date?>

<p>
	Nuevo mensaje de <?=$contactInfo['name']?>:
</p>

<p>
	Datos del usuario:
</p>

<ul>
	<li>
		Email: <?=$contactInfo['email']?>
	</li>
	<li>
		Teléfono: <?=$contactInfo['phone']?>
	</li>
</ul>

<p>
	Comentario:
	<?=$contactInfo['comment']?>
</p>