<?php
$titre="Mon compte";
ob_start();
echo'<form method="post" action="index.php?action=ajoutOeuvre">

<h1> Bonjour <i>' . $_SESSION["email"]. '</i> </h1>
	<p>
		<label for="adresse">Adresse :  '. $_SESSION["adresse"]  . ' </label>
		<input type="text" name="adresse" />
	</p>

	<p>
		<label for="codep">Code postal :  '. $_SESSION["codep"]  . ' </label>
		<input type="number" name="codep" min="0" max="99999"/>
	</p>


	<p>
		<label for="type">Date de naissance :  '. $_SESSION["daten"]  . ' </label>
		<input type="text" name="datenaissance" placeholder="">
	</p>

	<p>
		<label for="num">Téléphone :  '. $_SESSION["tel"]  . ' </label>
		<input type="number" name="num"  />
	</p>



<input type="submit" value="Ajouter" />
</form>';
$contenu=ob_get_clean();
require("Views/layout.php");

?>
