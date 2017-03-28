<?php
	$titre="Connexion	";
	ob_start();
  $_SESSION["accueil"]=true;
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
       
    </form>';
	$contenu=ob_get_clean();
	require("Views/layout.php");

?>
