<?php
	$titre="Liste des VIP";
	ob_start();
  echo'<form method="post" action="index.php?action=ajoutOeuvre">
    <p>
      <label for="Nom">Nom de l\'oeuvre :</label>
      <input type="text" name="nom" id="nom" />
		</p>

		<p>
			<label for="Nom">Auteur :</label>
			<input type="text" name="auteur" id="auteur" />
		</p>


		<p>
       <label for="type">Type de l\'oeuvre : </label><input type="text" name="type" placeholder="">
   </p>

	 <p>
		 <label for="Mouvement">Mouvement :</label>
		 <input type="text" name="Mouvement" id="Mouvement" />
	 </p>

	 <p>
		  <label for="Annee">Année :</label><input type="number" name="annee" id="annee" min="0" max="9999"/>
	 </p>

	 <p>
			<label for="fichier_a_uploader" title="Recherchez le fichier à uploader !">Envoyer le fichier :</label>
			<input type="hidden" name="MAX_FILE_SIZE" value="<?php echo MAX_SIZE; ?>" />
			<input name="fichier" type="file" id="fichier_a_uploader" />
	 </p>


      <input type="submit" value="Ajouter" />
  </form>';
  $contenu=ob_get_clean();
	require("Views/layout.php");

?>
