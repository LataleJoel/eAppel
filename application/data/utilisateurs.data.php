<?php
   defined('__EAPPEL__') or die('Acces interdit');
   
   class Utilisateurs extends DataTable{
       public function lister($order='',$tri=''){
           $sql = 'SELECT * FROM utilisateurs ORDER BY '.$order.' '.$tri;
           $req = $this->db->prepare($sql);
           try{
               $req->execute();
           }catch(PDOException $err){
               throw new Erreur('Erreur SQL '.$err->getMessage());
           }
           return $req->fetchAll(PDO::FETCH_ASSOC);
       }
	   
	   public function creer($login,$nom,$prenom,$motdepasse,$email){
			$sql= 'INSERT INTO utilisateurs(login,nom,prenom,motdepasse,email,type)
					values(:login,:nom,:prenom,:motdepasse,:email,1)';
			$req = $this->db->prepare($sql);
			$req->bindValue(':login',$login);
			$req->bindValue(':nom',$nom);
			$req->bindValue(':prenom',$prenom);
			$req->bindValue(':motdepasse',Authentification::encoder($motdepasse));
			$req->bindValue(':email',$email);
			try{
               $req->execute();
			}catch(PDOException $err){
               throw new Erreur('Erreur SQL '.$err->getMessage());
           }
	   }
	   
	   public function utilisateur($id){
			$sql = 'SELECT * FROM utilisateurs WHERE id = :id';
			$req = $this->db->prepare($sql);
			$req->bindValue(':id',$id); #bindvalue contrôle les valeurs qui sont associés à la requête
			try{
               $req->execute();
			}catch(PDOException $err){
               throw new Erreur('Erreur SQL '.$err->getMessage());
           }
		   return $req->fetch();
	   }
	   
	   public function editer($id,$nom,$prenom,$motdepasse,$email){
			if($motdepasse == ''){
				$sql= 'UPDATE utilisateurs 
						SET nom = :nom,prenom = :prenom,email = :email
						WHERE id = :id';
				$req = $this->db->prepare($sql);
			}
			else{
				$sql= 'UPDATE utilisateurs 
						SET nom = :nom,prenom = :prenom,motdepasse = :motdepasse,email = :email
						WHERE id = :id';
				$req = $this->db->prepare($sql);
				$req->bindValue(':motdepasse',Authentification::encoder($motdepasse));
			}
			$req->bindValue(':id',$id,PDO::PARAM_INT);
			$req->bindValue(':nom',$nom);
			$req->bindValue(':prenom',$prenom);
			$req->bindValue(':email',$email);
			try{
               $req->execute();
			}catch(PDOException $err){
               throw new Erreur('Erreur SQL '.$err->getMessage());
           }
	   }
	   
	   public function supprimer($id){
			$sql='DELETE from utilisateurs WHERE id = :id';
			$req = $this->db->prepare($sql);
			$req->bindValue(':id',$id,PDO::PARAM_INT);
			try{
			   $req->execute();
			}catch(PDOException $err){
			   throw new Erreur('Erreur SQL '.$err->getMessage());
			}
	   }
   }
?>
