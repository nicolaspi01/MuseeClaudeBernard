<?php
    echo '<!DOCTYPE html>
		<html>
		  <head>
		    <meta charset="utf-8"/>
		    <link rel="stylesheet" href="Web/CSS/style.css"/>
			<meta name="viewport" content="width=device-width, initial-scale=1.0">
		    <title>Cannes</title>
		  </head>

			<body>
			<form method="post" action="index.php?action=listeVIP">
       <p>
           <label for="identifiant">Identifiant :</label>
           <input type="text" name="identifiant" id="identifiant" />
			 </p>
			 <p>
           <label for="pass">Mot de passe :</label>
           <input type="password" name="pass" id="pass" />
      </p>
           <input type="submit" value="se connecter" />
    </form>
		</body>';
?>
