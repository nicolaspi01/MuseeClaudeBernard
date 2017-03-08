<?php
	$titre="Actions et échanges";
	ob_start();
  echo '<h1>Ajouter échange</h1>
  <form method="post" action="index.php?action=echangeAction&id='.$num.'">
    <p>
      <br/>
      <label for="type">Type de l\'échange :</label>
      <select name="type">
	  <option>Appel téléphonique</option>
	  <option>Courrier électronique</option>
	  <option>Courrier postal</option>
	  </select>

      <br/>
      <br/>

	  <label for="date">Date de l\'échange :</label>
	  <select name="jour">';
    for($i=1 ; $i<=31 ; $i++){
      echo'<option>'.$i.'</option>';
    }
	  echo'</select>
	  <select name="mois">';
    for($i=1 ; $i<=12 ; $i++){
      echo'<option>'.$i.'</option>';
    }
	  echo'</select>
	  <select name="année">';
    for($i=2016 ; $i<=2020 ; $i++){
      echo'<option>'.$i.'</option>';
    }
	  echo'</select>

      <br/>
	  <br/>

	  <label for="objet">Objet de l\'échange :</label>
	  <textarea name="onjet" id="objet"></textarea>

	  <br/>
	  <br/>

      <input type="submit" value="Ajouter" />

    </p>
  </form>';
  $contenu=ob_get_clean();
	require("Views/layout.php");

?>
