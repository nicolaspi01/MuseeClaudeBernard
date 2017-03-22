<?php
	class Inscription extends Model{
 

		public function insc($nom,$prenom,$email,$pw){
		
			$resultat = self::getBdd()->prepare('INSERT INTO PERS VALUES (0,?,?,"Membre",NULL,NULL,NULL,?,NULL,?)');
			$resultat->execute(array($nom,$prenom,$email,$pw));
			
			$_SESSION["Membre"]=true;
			$_SESSION["Admin"]=false;		
		}




// verifie si existance d'un compte ou email deja utilisé
// Si retourne 1 = déja un compte       	Si 2 = mail deja utilisé   		si 0 = libre
		public function existe($user,$pw){
			if ( self::getBdd()->query("SELECT email FROM PERS where email='$user' AND mdp='$pw'")->fetch() > 0)
				return "1";

			elseif ( self::getBdd()->query("SELECT email FROM PERS where email='$user'")->fetch() > 0)
				return "2";

			return "0";
		}


//vérifie si mail valide et mdp plus de 3 caracteres
// si retourne 0 = valide sinon (1) = non valide
		public function verifIdent($user,$pw){
		if (filter_var($user, FILTER_VALIDATE_EMAIL) && strlen($pw)>2) 
   				 return 0;
   		return 1;
		}

}

?>