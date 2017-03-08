<?php
	$titre="Actions et échanges";
	ob_start();
	echo "<h2>Echanges</h2>";
	foreach ($echange as $ligne){
				echo '<ul>
				<li><b>Type</b> : '.$ligne['typeEchange'].'</li><br/>
				<li><b>Date</b> : '.date_format(date_create($ligne['dateEchange']),"d/m/Y").' </li><br/>
				<li><b>Contenu</b> : '.$ligne['contenuEchange']. '</li><br/>
				<li><a class="not" href="index.php?action=echangeAction&id='.$num.'&supprimerEchange='.$ligne["id"].'">Supprimer</a></li>
				</ul><br/>';
	}

	echo "<h2>Actions</h2>";
	foreach ($action as $ligne){
				echo '<ul>
				<li><b>Date début</b> : '.date_format(date_create($ligne['dateDebutAction']),"d/m/Y").'</li><br/>
				<li><b>Date de fin</b> : '.date_format(date_create($ligne['dateFinAction']),"d/m/Y").' </li><br/>
				<li><b>Contenu</b> : '.$ligne['contenuAction']. '</li><br/>
				<li><a class="not" href="index.php?action=echangeAction&id='.$num.'&supprimerAction='.$ligne["id"].'">Supprimer</a></li>
				</ul><br/>';
	}

	echo'<p><form method="post" action="index.php?action=echangeAction&id='.$_GET['id'].'">
    <input type="submit" name="echange" value="Ajouter Echange">
  </form>
  </p>

  <form method="post" action="index.php?action=echangeAction&id='.$_GET['id'].'">
    <input type="submit" name="action" value="Ajouter Action">
  </form>';
  $contenu=ob_get_clean();
	require("Views/layout.php");

?>
