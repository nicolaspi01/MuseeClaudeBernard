<?php

	$titre="Reservation";
	ob_start();


  echo'

<form method="post" action="index.php?action=Reservation" >

<p>
  <label for="Nom">Intitulé de visite :</label>
  <input type="text" name="Intitul" id="Intitul" />
</p>

<p>
  <label for="sujet">Sujet de visite :</label>
  <input type="text" name="sujet" id="sujet" />
</p>

<p>
  <label for="nbPers">Nombre de personnes :</label>
  <input type="text" name="nbpers" id="nbpers" />
</p>

<p>
  <label for="date">Date souhaité :</label>
  <input type="date" name="date" id="date" />
</p>

<input type="submit" value="Envoyer" />



</form>

';


  $contenu=ob_get_clean();
  require("Views/layout.php");

?>
