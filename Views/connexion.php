<?php
	$titre="Connexion	";
	ob_start();

echo '
			<form method="post" action="index.php?action=verifco">
       <p>
           <label for="identifiant">Identifiant :</label>
           <input type="text" name="identifiant" id="identifiant" />
			 </p>
			 <p>
           <label for="pass">Mot de passe :</label>
           <input type="password" name="pass" id="pass" />
      </p>

           <input type="submit" value="Se connecter" /></br>
           <a href="index.php?action=inscrip">Vous n\'avez pas de compte ?</a>

    </form>';
	$contenu=ob_get_clean();
	require("Views/layout.php");

?>
