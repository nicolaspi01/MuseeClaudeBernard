<?php

	class VIPManager extends Model{

        public function getVIP(){
      		$liste=$this -> executerRequete("Select VIP.numPersonne, typeVIP, nomPersonne, nationalitePersonne, genrePersonne from VIP, Personne where VIP.numPersonne = Personne.numPersonne");
					$resultat = $liste ->fetchAll(PDO::FETCH_ASSOC);
					return $resultat;
        }

				public function addVIP($nom,$nat,$genre,$type){
					$resultat = self::getBdd()->prepare('INSERT INTO Personne VALUES (NULL,?,?,NULL,?)');
					$resultat->execute(array($nom,$nat,$genre));
					$id = $this-> executerRequete("SELECT numPersonne FROM Personne WHERE nomPersonne=?",array($nom));
					$id = $id -> fetch(PDO::FETCH_ASSOC);
					$maj = self::getBdd()->prepare('INSERT INTO VIP VALUES (?,?,10)');
					$maj->execute(array($id['numPersonne'],$type));

				}

				public function modifierVip($id,$nom,$nat,$genre,$type){
					$resultat = self::getBdd()->prepare('UPDATE Personne SET nomPersonne=?, nationalitePersonne=?, genrePersonne=? WHERE numPersonne=?');
					$resultat->execute(array($nom,$nat,$genre,$id));
					$maj = self::getBdd()->prepare('UPDATE VIP SET typeVIP=? WHERE numPersonne=?');
					$maj->execute(array($type,$id));
				}

				public function supprimerVip($id){
					$maj = self::getBdd()->prepare('DELETE FROM VIP WHERE numPersonne=?');
					$maj->execute(array($id));
					$maj2 = self::getBdd()->prepare('DELETE FROM Personne WHERE numPersonne=?');
					$maj2->execute(array($id));
				}

				public function getEchange($id){
					$liste=$this -> executerRequete("Select id, typeEchange, dateEchange, contenuEchange From Echange  where numPersonne = ?", array($id));
					$resultat = $liste ->fetchAll(PDO::FETCH_ASSOC);
					return $resultat;
				}

				public function addEchange($id,$type, $date,$contenuEchange){
					$maj = self::getBdd()->prepare('INSERT INTO Echange VALUES (NULL,?,?,?,?)');
					$maj->execute(array($id,$type,$date,$contenuEchange));
				}

				public function supprimerEchange($id){
					$maj = self::getBdd()->prepare('DELETE FROM Echange WHERE id=?');
					$maj->execute(array($id));
				}

				public function getAction($id){
					$liste=$this -> executerRequete("Select id, dateDebutAction, contenuAction, dateFinAction From Action  where numPersonne = ?", array($id));
					$resultat = $liste ->fetchAll(PDO::FETCH_ASSOC);
					return $resultat;
				}

				public function addAction($id,$datedebut, $contenuAction,$dateFin){
					$maj = self::getBdd()->prepare('INSERT INTO Action VALUES (NULL,?,?,?,?)');
					$maj->execute(array($id,$datedebut,$contenuAction,$dateFin));
				}

				public function supprimerAction($id){
					$maj = self::getBdd()->prepare('DELETE FROM Action WHERE id=?');
					$maj->execute(array($id));
				}
    }
