<?php
	session_name("Utilisateur");
	session_start();
	$activeList='0';
	$activeAdd='0';
	require("Model/Model.php");
	require("Model/VIPManager.php");
  $vm = new VIPManager();
	$results = $vm -> getOeuvres();
	if(!isset($_GET["action"])){
		require("Views/connexion.php");
	}
	else{

		if($_GET["action"] == "listeOeuvres"){
			$activeList='active';
			require("Views/oeuvres.php");
			if(isset($_GET['supprimerVip'])){
				$idVip=$_GET['supprimerVip'];
				$vm -> supprimerVip($idVip);
				header('Location: index.php?action=listeOeuvres');

			}
		}

		elseif ($_GET["action"] == "modifierVip") {
			$num=$_GET['id'];
			foreach($results as $ligne){
				if($ligne['numPersonne']==$_GET['id']){
					$nomMod=$ligne['nomPersonne'];
					$typeMod=$ligne['typeVIP'];
					$natMod=$ligne['nationalitePersonne'];
					$genreMod=$ligne['genrePersonne'];
				}
			}
			if(isset($_POST['nom'])){
				$nom=$_POST['nom'];
				$type=$_POST['type'];
				$genre=$_POST['genre'];
				$nat=$_POST['Nationalite'];
				$typeM="";
				foreach ($type as $key => $value) {
						$typeM=$typeM.$value;
						$typeM=$typeM." ";
				}
			$vm -> modifierVip($num,$nom,$nat,$genre,$typeM);
			}
			require("Views/modifier.php");
		}

		elseif($_GET["action"] == "ajoutVIP"){
			$activeAdd="active";
			require("Views/ajoutVIP.php");
			if(isset($_POST['nom'])){
				$nom=$_POST['nom'];
				$type=$_POST['type'];
				$genre=$_POST['genre'];
				$nat=$_POST['Nationalite'];
				$typeM="";
				foreach ($type as $key => $value) {
						$typeM=$typeM.$value;
						$typeM=$typeM." ";
				}
				$vm -> addVIP($nom,$nat,$genre,$typeM);
			}
		}

		elseif($_GET["action"] == "echangeAction"){
			$num=$_GET['id'];
			if(isset($_POST['type'])){
				if(isset($_POST['onjet'])){
				$type=$_POST['type'];
				$jour=$_POST['jour'];
				$mois=$_POST['mois'];
				$année=$_POST['année'];
				$date=$année.'-'.$mois.'-'.$jour;
				$objet=$_POST['onjet'];
				$vm -> addEchange($num,$type,$date,$objet);
			}
		}if(isset($_POST['jourDebA'])){
					if(isset($_POST['objetA'])){
					$objetA=$_POST['objetA'];

					$jourDebA=$_POST['jourDebA'];
					$moisDebA=$_POST['moisDebA'];
					$annéeDebA=$_POST['annéeDebA'];
					$dateDebA=$annéeDebA.'-'.$moisDebA.'-'.$jourDebA;

					$jourFinA=$_POST['jourFinA'];
					$moisFinA=$_POST['moisFinA'];
					$annéeFinA=$_POST['annéeFinA'];
					$dateFinA=$annéeFinA.'-'.$moisFinA.'-'.$jourFinA;
					$vm -> addAction($num,$dateDebA,$objetA,$dateFinA);
				}

			}if(isset($_GET['supprimerEchange'])){
				$idEchange=$_GET['supprimerEchange'];
				$vm -> supprimerEchange($idEchange);
			}
			if(isset($_GET['supprimerAction'])){
				$idAction=$_GET['supprimerAction'];
				$vm -> supprimerAction($idAction);
			}

			if(isset($_POST['echange'])){
				require("Views/echange.php");

			}

			elseif(isset($_POST['action'])){
				require("Views/action.php");
			}

			else{
				$echange = $vm -> getEchange($_GET["id"]);
				$action = $vm -> getAction($_GET["id"]);
				require("Views/echangeAction.php");
			}
		}
	}
?>
