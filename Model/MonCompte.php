<?php

class MonCompte extends Model{



	function getAdresse(){
		$email = $_SESSION["email"];
		$liste=   self::getBdd()->query("Select adresse from PERS where email = '$email'" );
		$resultat = $liste ->fetch();
		return $resultat['adresse'];
	}

	function getNum(){
		$email = $_SESSION["email"];
		$liste=   self::getBdd()->query("Select numero from PERS where email = '$email'" );
		$resultat = $liste ->fetch();
		return $resultat['numero'];
	}

function getDaten(){
		$email = $_SESSION["email"];
		$liste=   self::getBdd()->query("Select dateNaiss from PERS where email = '$email'" );
		$resultat = $liste ->fetch();
		return $resultat['dateNaiss'];
	}


	function getCodep(){
		$email = $_SESSION["email"];
		$liste=   self::getBdd()->query("Select codepost from PERS where email = '$email'" );
		$resultat = $liste ->fetch();
		return $resultat['codepost'];
	}

}


?>