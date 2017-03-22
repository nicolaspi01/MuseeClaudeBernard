<?php
echo '<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
	<link rel="stylesheet" href="Web/CSS/style.css"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Inscription</title>
</head>

<body>

	<form method="post" action="index.php?action=verifinscrip">

		<p>
			<label for="nom">Nom :</label>
			<input type="text" name="nom"/>
		</p>
		<p>
			<label for="prenom">Prenom :</label>
			<input type="text" name="prenom""/>
		</p>
		<p>
			<label for="email">Email :</label>
			<input type="text" name="email"/>
		</p>
		<p>
			<label for="pass">Mot de passe :</label>
			<input type="password" name="pass"/>
		</p>

		<input type="submit" value="S\'inscrire" /></br>
		<a href=".">Vous avez déjà un compte ?</a>
	</form>

</body>';
?>
