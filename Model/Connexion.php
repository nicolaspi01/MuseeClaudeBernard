<?php
	class Connexion extends Model{
 

		public function conn($user,$pw){
			$requete= self::getBdd()->query("SELECT idPers FROM PERS where email='$user' AND mdp='$pw'");
			$nbligne = $requete->fetch();

			if( $nbligne >0){
				$_SESSION["email"] = $user;
				return true;
			}
		}



		public function verifAdmin($user,$pw){
			$requete= self::getBdd()->query("SELECT idPers FROM PERS where email='$user' AND mdp='$pw' AND TypePers='Admin'");
			$nbligne = $requete->fetch();

			if( $nbligne >0)
				return true;

		}

}

?>