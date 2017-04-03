<?php
session_name("Utilisateur");
session_start();
$activeList='0';
$activeAdd='0';

require("Model/Model.php");
require("Model/Inscription.php");
require("Model/OeuvresManager.php");
require("Model/Connexion.php");
require("Model/MonCompte.php");


$om = new OeuvresManager();
$conn = new Connexion();
$ins = new Inscription();
$compte = new MonCompte();

$results = $om -> getOeuvres();
if(!isset($_GET["action"])){
	require("Views/connexion.php");
}
else{
	$_SESSION["accueil"]=false;

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

	elseif($_GET["action"] == "Modifier"){
		if ( strlen($_POST["adresse"])>0)
			$compte->setAdresse( $_POST["adresse"] );
		if ( strlen($_POST["codep"])>0)
			$compte->setCodep( $_POST["codep"] );
		if ( strlen($_POST["daten"])>0)
			$compte->setDaten( $_POST["daten"] );
		if ( strlen($_POST["num"])>0)
			$compte->setNum( $_POST["num"] );

		require("Views/oeuvres.php");
		exit;

	}

	elseif($_GET["action"] == "inscrip"){
		require("Views/inscription.php");
	}
	elseif($_GET["action"] == "verifinscrip"){
			//$ins->existe($_POST['email'],$_POST['pass']);
		$ins->insc($_POST['nom'],$_POST['prenom'],$_POST['email'],$_POST['pass']);
		header('Location: index.php?action=listeOeuvres');
		exit;
	}


	elseif($_GET["action"] == "deconnection"){
		session_destroy();
		header('Location: index.php');
	}


	elseif($_GET["action"] == "listeOeuvres"){
		$activeList='active';
		require("Views/oeuvres.php");
		
	}
	
	elseif($_GET["action"] == "moncompte"){
		$_SESSION["adresse"] = $compte->getAdresse();
		$_SESSION["daten"] = $compte->getDaten();
		$_SESSION["codep"] = $compte->getCodep();
		$_SESSION["tel"] = $compte -> getNum();
		require("Views/moncompte.php");
		exit;
	}


	elseif($_GET["action"] == "Supp"){
			$id = $_GET["id"];
			$om -> supprimerOeuvre($id);	
			header('Location: index.php?action=listeOeuvres');
		}


				// devenir mecene
	elseif($_GET["action"] == "FaireunDon"){
		$activeAdd='active';
		require("Views/FaireDon.php");

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


	elseif($_GET["action"] == "ajoutOeuvre"){
		$activeAdd="active";
		require("Views/ajoutOeuvre.php");
		if(isset($_POST['nom'])){
			if(isset($_FILES['avatar']))
			{

				$dossier = $_SERVER['DOCUMENT_ROOT']."/MuseeClaudeBernard/Web/img/";
				$fichier = basename($_FILES['avatar']['name']);
				$taille_maxi = 900000000000000;
				$taille = filesize($_FILES['avatar']['tmp_name']);


				if($taille>$taille_maxi)
				{
					$erreur = 'Le fichier est trop gros...';
				}
							if(!isset($erreur)) //S'il n'y a pas d'erreur, on upload
							{
							     //On formate le nom du fichier ici...
								$fichier = "/".$_POST["nom"];
							     if(move_uploaded_file($_FILES['avatar']['tmp_name'], $dossier . $fichier.".jpg")) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
							     {
							     	echo 'Upload effectué avec succès !';
							     }
							     else //Sinon (la fonction renvoie FALSE).
							     {
							     	echo 'Echec de l\'upload !';
							     }
							 }
							 else
							 {
							 	echo $erreur;
							 }
			}

							$nom=$_POST['nom'];
							$auteur=$_POST['auteur'];
							$type=$_POST['type'];
							$mouve=$_POST['Mouvement'];
							$annee=$_POST["annee"];
							$om -> addOeuvre($nom,$auteur,$type,$mouve,$annee);
				//script upload

						}
		}//fin ajoutOeuvre

}
				?>
