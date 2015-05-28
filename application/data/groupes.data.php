<?php
   defined('__EAPPEL__') or die('Acces interdit');
   class Groupes extends DataTable{
   
       public function lister(){
			$sql = 'SELECT id, CONCAT(cursus,"A",annee,"G",numero) AS nom FROM groupes
					ORDER BY cursus,annee,numero';
			$req = $this->db->prepare($sql);
            try{
               $req->execute();
            }catch(PDOException $err){
               throw new Erreur('Erreur SQL '.$err->getMessage());
            }
           return $req->fetchAll(PDO::FETCH_ASSOC);
       }
	   
	   public function getGroupe($id){
			$sql = 'SELECT*, CONCAT(cursus,"A",annee,"G",numero) AS groupe FROM groupes
					WHERE id = :id';
			$req = $this->db->prepare($sql);
			$req->bindValue(':id',$id,PDO::PARAM_INT);
			try{
               $req->execute();
            }catch(PDOException $err){
               throw new Erreur('Erreur SQL '.$err->getMessage());
            }
           return $req->fetch(PDO::FETCH_ASSOC);
	   }
   }
?>
