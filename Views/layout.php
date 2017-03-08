<?php

echo'<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="Web/CSS/style.css"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cannes</title>
  </head>
  <body>

    <nav>
        <img src="Web/img/cannes.png"/>
        <ul>
            <li class="'.$activeList.'"><a href="./index.php?action=listeVIP">Liste des VIP</a></li>
            <li class="'.$activeAdd.'"><a href="./index.php?action=ajoutVIP">Ajouter un VIP</a></li>
            <li><a href="./index.php">Déconnexion</a></li>
        </ul>
    </nav>';

    echo $contenu.'</body>
    </html>';
?>
