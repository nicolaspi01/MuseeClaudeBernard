<?php
	$titre="Inscription";
	ob_start();

echo '

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
';
	$contenu=ob_get_clean();
	require("Views/layout.php");

?>