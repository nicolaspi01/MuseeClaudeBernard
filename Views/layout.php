<?php

echo'<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="Web/CSS/style.css"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Musée Claude Bernard</title>
  </head>
  <body>

    <nav>
        <img src="Web/img/clb.png"/>
        <ul>
            <li class="'.$activeList.'"><a href="./index.php?action=listeOeuvres">Liste des Oeuvres</a></li>
            <li class="'.$activeAdd.'"><a href="./index.php?action=ajoutOeuvre">Ajouter une Oeuvre</a></li>
			<li class="'.$activeAdd.'"><a href="./index.php?action=FaireunDon">Faire un don</a></li>
            <li><a href="./index.php">Déconnexion</a></li>
        </ul>
    </nav>';

    echo $contenu.'</body>
    </html>';
?>
