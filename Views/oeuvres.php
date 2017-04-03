<?php
	$titre="Liste des Oeuvres";
	ob_start();
    echo '<table class="ac_bord">
	<tr>
		<th></th>
		<th>Intitule</th>
		<th>Auteur</th>
		<th></th>
	</tr>';
	foreach ($results as $ligne){
				echo '<tr>
				<td><img class="oeuvres" src="Web/img/'.str_replace(' ', '', $ligne['Intitule']).'.jpg"</td>
				<td>'.$ligne['Intitule'].'</td>
				<td>'.$ligne['Auteur'].'</td>';
				
				if ( isset($_SESSION['Admin']))	if(  ($_SESSION['Admin']==true) )
						echo '<td><a href="index.php?action=Supp&id='.$ligne['idOeuvre'].'">Supprimer</a>
				</tr>';
	}
	echo '</table>';
	$contenu=ob_get_clean();
	require("Views/layout.php");

?>
