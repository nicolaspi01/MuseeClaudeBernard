<?php
	session_name("Utilisateur");
	session_start();
	$activeList='0';
	$activeAdd='0';

	require("Model/Model.php");
	require("Model/Inscription.php");
	require("Model/OeuvresManager.php");
	require("Model/Connexion.php");

  $om = new OeuvresManager();
  $conn = new Connexion();
  $ins = new Inscription();

	$results = $om -> getOeuvres();
	if(!isset($_GET["action"])){
		require("Views/connexion.php");
	}
	else{

		if($_GET["action"] == "verifco"){

				$login=$_POST['identifiant'];
				$password=$_POST['pass'];

				if( $conn->conn($login,$password) == true){
					$_SESSION['Connecte']=true;
				}

				else{
					header('Location: Views/refuse.php' );
					exit;
				}

				if( $conn->verifAdmin($login,$password) == true){
					$_SESSION['Admin']=true;
				}

				header('Location: index.php?action=listeOeuvres');
					exit;
		}




		if($_GET["action"] == "inscrip"){
			require("Views/inscription.php");
		}
		if($_GET["action"] == "verifinscrip"){
			//$ins->existe($_POST['email'],$_POST['pass']);
			$ins->insc($_POST['nom'],$_POST['prenom'],$_POST['email'],$_POST['pass']);


			header('Location: index.php?action=listeOeuvres');
			exit;
		}


	if($_GET["action"] == "deconnection"){
		session_destroy();
		header('Location: index.php');
	}


		if($_GET["action"] == "listeOeuvres"){
			$activeList='active';
			require("Views/oeuvres.php");
			if(isset($_GET['supprimerVip'])){
				$idVip=$_GET['supprimerVip'];
				$vm -> supprimerVip($idVip);
				header('Location: index.php?action=listeOeuvres');

			}
		}


		// devenir mecene
		if($_GET["action"] == "FaireunDon"){
			$activeAdd='active';
			require("Views/FaireDon.php");

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

		elseif($_GET["action"] == "ajoutOeuvre"){
			$activeAdd="active";
			require("Views/ajoutOeuvre.php");
			if(isset($_POST['nom'])){
				$nom=$_POST['nom'];
				$auteur=$_POST['auteur'];
				$type=$_POST['type'];
				$mouve=$_POST['Mouvement'];
				$annee=$_POST["annee"];
				if(isset($_FILES['fichier'])){ //on vérifie si l'image à été envoyée
					$fichier=$_FILES['fichier'];
					require("Views/upload.php");
				}
				$om -> addOeuvre($nom,$auteur,$type,$mouve,$annee);
				print_r($message);
			}
		}

				//visite
				elseif($_GET["action"] == "Reservation"){
					$activeAdd='active';
					require("Views/reservation.php");
					if(isset($_POST['Intitul'])){
						$Intitul=$_POST['Intitul'];
						$sujet=$_POST['sujet'];
						$nbpers=$_POST['nbpers'];
						$date=$_POST['date'];
						$om -> addVisite($Intitul,$sujet,$nbpers,$date);
						print_r("Envoyé ! :)");
						}
						//print_r($message);
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
