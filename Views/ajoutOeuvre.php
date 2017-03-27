<?php
	$titre="Liste des VIP";
	ob_start();
  echo'<form method="post" action="index.php?action=ajoutOeuvre" enctype="multipart/form-data">
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
		<input type="hidden" name="MAX_FILE_SIZE" value="9999999999999999999999999999999999">
		<label for="avatar">Photo :</label><input type="file" name="avatar">
	 </p>


      <input type="submit" value="Ajouter" />
  </form>';
  $contenu=ob_get_clean();
	require("Views/layout.php");

?>
