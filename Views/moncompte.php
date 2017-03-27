<?php
$titre="Mon compte";
ob_start();
echo'<form method="post" action="index.php?action=Modifier">

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
		<label for="daten">Date de naissance :  '. $_SESSION["daten"]  . ' </label>
		<input type="text" name="daten" placeholder="">
	</p>

	<p>
		<label for="num">Téléphone :  ' .'0'. $_SESSION["tel"]  . ' </label>
		<input type="number" name="num"  />
	</p>



<input type="submit" value="Modifier" />
</form>';
$contenu=ob_get_clean();
require("Views/layout.php");

?>
