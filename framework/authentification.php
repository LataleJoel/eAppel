<?php
	defined('__FRAMEWORK3IL__') or die('Acces interdit');
	
	class Authentification{
		protected $table;
		protected $colLogin;
		protected $colMotdepasse;
		protected $colIdentifiant;
		protected static $_authentification = null;
		protected $utilisateur = null;
		
		private function __construct($table,$colIdentifiant,$colLogin,$colMotdepasse){
			$this->table = $table;
			$this->colIdentifiant = $colIdentifiant;
			$this->colLogin = $colLogin;
			$this->colMotdepasse = $colMotdepasse;
			
			if(isset($_SESSION['framework3il.authentification']))
				$this->chargerUtilisateur();
		}
		
		public static function getAuthentification($table=null,$colIdentifiant=null,$colLogin=null,$colMotdepasse=null){
        if(is_null(self::$_authentification) === true){
			if($table!=null && $colIdentifiant!= null && $colLogin!= null && $colMotdepasse!=null)
				self::$_authentification = new Authentification($table,$colIdentifiant,$colLogin,$colMotdepasse);
			else
				die('un des paramètres de l\'authentification n\'est pas renseigné');
        }
        return self::$_authentification;
		}
		
		public static function authentifier($login,$motdepasse){
			$app = Application::getApplication();
			$db = $app->getDB();
			$sql = 'SELECT '.self::$_authentification->colIdentifiant.
					' FROM '.self::$_authentification->table.
					' WHERE '.self::$_authentification->colLogin.'=:login AND '.
					self::$_authentification->colMotdepasse.'=:motdepasse LIMIT 1';
			$req = $db->prepare($sql);
			$req->bindValue(':login',$login);
			$req->bindValue(':motdepasse',Authentification::encoder($motdepasse));
			try{
               $req->execute();
            }catch(PDOException $err){
               throw new Erreur('Erreur SQL '.$err->getMessage());
            }
			$resultat = $req->fetchColumn();
            if($resultat == false)
				return false;
			$_SESSION['framework3il.authentification'] = $resultat;
			return true;
		}
		
		protected function chargerUtilisateur(){
			$app = Application::getApplication();
			$db = $app->getDB();
			$sql = 'SELECT* FROM '.$this->table.
					' WHERE '.$this->colIdentifiant.'='.$_SESSION['framework3il.authentification'];
			$req = $db->prepare($sql);
			try{
               $req->execute();
            }catch(PDOException $err){
               throw new Erreur('Erreur SQL '.$err->getMessage());
            }
			$this->utilisateur = $req->fetch(PDO::FETCH_ASSOC);
			$this->utilisateur['motdepasse'] = "";
		}
		
		public static function deconnecter(){
			$_authentification->utilisateur = null;
			unset($_SESSION['framework3il.authentification']);
		}
		
		public static function estConnecte(){
			if(is_null(self::$_authentification->utilisateur))
				return false;
			else
				return true;
		}
		
		public static function getUtilisateur(){
			return self::$_authentification->utilisateur;
		}
		
		public static function getUtilisateurID(){
			self::$_authentification->utilisateur[self::$_authentification->colIdentifiant];
		}
		
		public static function encoder($motdepasse){
			return md5(Authentification::saler($motdepasse));
		}
		
		public static function saler($str){
			$config = Configuration::getConfig();
			$tab = str_split($config->auth_secret.''.$str);
			return implode('',$tab);
		}
	}
?>