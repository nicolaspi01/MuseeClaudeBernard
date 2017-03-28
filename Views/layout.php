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
      ';

      if ( isset($_SESSION['Admin']))
       if(  ($_SESSION['Admin']==true) )
        echo '<li class="'.$activeAdd.'"><a href="./index.php?action=ajoutOeuvre">Ajouter une Oeuvre</a></li>';

      if ( isset($_SESSION['Connecte']))
      {
       if(  $_SESSION['Connecte']==true ) {

         if( isset($_SESSION['Admin']) &&  $_SESSION['Admin']!=true )
           echo ' <li class="'.$activeAdd.'"><a href="./index.php?action=FaireunDon">Faire un don</a></li>';
         elseif (  !isset($_SESSION['Admin']) ){

           echo ' <li class="'.$activeAdd.'"><a href="./index.php?action=Reservation">Reserver visite guidée</a></li>';
           echo ' <li class="'.$activeAdd.'"><a href="./index.php?action=FaireunDon">Faire un don</a></li>';

         }

         echo '<li class="'.$activeAdd.'"><a href="./index.php?action=moncompte">Mon compte</a></li>';
         echo '<li class="'.$activeAdd.'"><a href="./index.php?action=deconnection">Déconnexion</a></li>';
       }
     }
     else{


      if (!$_SESSION["accueil"]){
        echo '<li><a href="./index.php">Connection</a></li>';
        echo '<li><a href="./index.php?action=inscrip">Inscription</a></li>'; 
      }
      else{
        if ( isset($_GET["action"])){
          if ($_GET["action"]=="inscrip")
           echo '<li><a href="./index.php">Connection</a></li>';
        }
        else
         echo '<li><a href="./index.php?action=inscrip">Inscription</a></li>';    
     }





   $_SESSION["accueil"]=false;

 }

 echo '

</ul>
</nav>';

echo $contenu.'</body>
</html>';
?>
