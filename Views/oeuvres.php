<?php
	$titre="Liste des Oeuvres";
	ob_start();
    echo '<table class="ac_bord">
	<tr>
		<th></th>
		<th>Intitule</th>
		<th>Auteur</th>
	</tr>';
	foreach ($results as $ligne){
				echo '<tr>
				<td><img class="oeuvres" src="Web/img/'.str_replace(' ', '', $ligne['Intitule']).'.jpg"</td>
				<td>'.$ligne['Intitule'].'</td>
				<td>'.$ligne['Auteur'].'</td>
				</tr>';
	}
	echo '</table>';
	$contenu=ob_get_clean();
	require("Views/layout.php");

?>
