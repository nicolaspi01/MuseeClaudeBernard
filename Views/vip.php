<?php
	$titre="Liste des VIP";
	ob_start();
    echo '<table class="ac_bord">
	<tr>
		<th>Nom</th>
		<th>Type</th>
		<th>Genre</th>
		<th>Nationalite</th>
		<th>Echanges et actions</th>
		<th>Modifier</th>
		<th></th>
	</tr>';
	foreach ($results as $ligne){
				echo '<tr>
				<td>'.$ligne['nomPersonne'].'</td>
				<td>'.$ligne['typeVIP'].'</td>
				<td>'.$ligne['genrePersonne'].'</td>
				<td>'.$ligne['nationalitePersonne'].'</td>
				<td><a href="index.php?action=echangeAction&id='.$ligne['numPersonne'].'">Détails</a></td>
				<td><a href="index.php?action=modifierVip&id='.$ligne['numPersonne'].'">modifier</a></td>
				<td><a class="not" href="index.php?action=listeVIP&supprimerVip='.$ligne['numPersonne'].'">Supprimer</a></td>
				</tr>';
	}
	echo '</table>';
	$contenu=ob_get_clean();
	require("Views/layout.php");

?>
