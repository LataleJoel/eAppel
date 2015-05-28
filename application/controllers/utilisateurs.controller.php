<?php
    defined('__EAPPEL__') or die('Acces interdit');
    require_once 'application/data/utilisateurs.data.php';
    
    class UtilisateursController extends Controleur{
        
        public function __construct(){
            parent::__construct('lister');
        }
        public function demoAction(){
            $page = Page::getPage();
            $page->setTemplate('application');
            $page->setVue('utilisateurs');
            $page->message = 'Coucou depuis un controleur';
        }
        
         public function testAction(){
            $page = Page::getPage();
            $page->setTemplate('application');
            $page->setVue('utilisateurs');
            $page->message = 'Coucou je suis l\'action test ;)';
        }
		
		public function _preAction(){
			if(Authentification::estConnecte() === false)
				$this->rediriger("index.php","");
		}
        
        public function listerAction(){
			$order = strtolower(Requete::get('order','login'));
			if(in_array($order,array('login','nom','prenom','email','type')) === false){
				$order = 'login';
			}
			
			$tri = strtolower(Requete::get('dir','asc'));
			if(in_array($tri,array('asc','desc')) === false){
				$tri = 'asc';
			}
			
            $page = Page::getPage();
            $page->setTemplate('application');
            $page->setVue('utilisateurs');
			$page->ajouterCSS('liste_enseignants.css');
			#ajout personnel :)
			$page->title = "Liste des utilisateurs";
            $utilisateurs = new Utilisateurs();
			$page->triGrille = array('order'=>$order,'tri'=>$tri);
            $page->utilisateurs = $utilisateurs->lister($order,$tri);
			//message avertissant de l'action effectuée
			$page->message = Message::retirer();
        }
        
        public function editerAction($edition = true){
			#création d'un objet du modèle utilisateurs pour pouvoir exploiter ses différentes méthodes
			$utilisateurs = new Utilisateurs();
		
			$page = Page::getPage();
			$page->ajouterCSS('liste_enseignants.css');
			
			 
			#contrôle des données en javascript
			$page->ajouterScript('jquery-1.10.2.min.js');
			$page->ajouterScript('jquery-1.10.2.min.map');
			if($edition == true){
				/*je charge un fichier js autre que utilisateurs.js pour l'édition
				car il n'est pas necessaire d'écrire un mot de passe, ce que utilisateurs.js oblige à faire
				bon le soucis c'est que si on passe de la création à l'édition mon code n'est plus tout à fait exact
				mais le php est toujours là :)*/
				$page->ajouterScript('utilisateurs.editer.js');
			}
			
            $page->setTemplate('application');
            $page->setVue('utilisateur');
			#ajout personnel :)
			$page->title = "Modification de compte";
			$page->titre = 'Edition de l\'utilisateur'; //titre
            $page->login ='';
            $page->nom ='';
            $page->prenom ='';
            $page->email ='';
            $page->password ='';
            $page->confirmation ='';
			$page->id = 0; 
			
			#récuperation de l'id pour peupler le formulaire d'édition avec les informations de l'utilisateur
			$page->id = filter_var(requete::get('id',0),FILTER_VALIDATE_INT);
			if($page->id != 0){
				$user = $utilisateurs->utilisateur($page->id);
				foreach($user as $cle => $val){	
					if($cle != 'motdepasse')
						$page->$cle= $val ;
				}
			}
			//recupération des données du formulaire
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			
				$page->id = Requete::post('id',0);

				$page->login = filter_var(trim(Requete::post('login', '')),FILTER_SANITIZE_STRING);
				if(strlen($page->login) < 4){
					$page->erreur = 'Longueur du login insuffisante(4 caract&egrave;res minimum)';
					return;
				}
				$page->nom = filter_var(trim(Requete::post('nom', '')),FILTER_SANITIZE_STRING);
				if(strlen($page->nom) == 0){
					$page->erreur = 'Longueur du nom insuffisante';
					return;
				}
				$page->prenom = filter_var(trim(Requete::post('prenom', '')),FILTER_SANITIZE_STRING);
				if(strlen($page->prenom) == 0){
					$page->erreur = 'Longueur du pr&eacute;nom insuffisante';
					return;
				}
				$page->email = trim(Requete::post('email', ''));
				if(strlen($page->email) == 0){
					$page->erreur = 'Veuiller renseigner l\'e-mail';
					return;
				}
				$page->email = filter_var($page->email,FILTER_SANITIZE_EMAIL);
				if(filter_var($page->email,FILTER_VALIDATE_EMAIL) === false){
					$page->erreur = 'Votre e-mail est incorrect';
					return;
				}
				//attention j'ai bidouillé avec l'id pour tester si on est à l'édition ou à la création
				$page->password = filter_var(trim(Requete::post('password', '')),FILTER_SANITIZE_STRING);
				if(($page->id == 0 && strlen($page->password) < 7 )||($page->id != 0 && strlen($page->password) > 0 && strlen($page->password) < 7 )){ 
					$page->erreur = 'Longueur du mot de passe insuffisante(7 caract&egrave;res minimum)';
					return;
				}
				$page->confirmation = filter_var(trim(Requete::post('confirmation', '')),FILTER_SANITIZE_STRING);
				if($page->confirmation !== $page->password){
					$page->erreur = 'la confirmation doit être identique au mot de passe';
					return;
				}
				
				//modification de la table des utilisateurs + redirection
				if($page->id != 0){
					$utilisateurs->editer($page->id,$page->nom,$page->prenom,$page->password,$page->email);
					$this->rediriger("index.php?controller=utilisateurs","Utilisateur modifié");
				}
				else{
					$utilisateurs->creer($page->login,$page->nom,$page->prenom,$page->password,$page->email);
					$this->rediriger("index.php?controller=utilisateurs","Utilisateur enregistré");
				}
				
            }
        }
		
		public function creerAction(){
			$this->editerAction(false);
			$page = Page::getPage();
			//titre
			$page->titre = 'Nouvel utilisateur';
			#contrôle des données en javascript
			$page->ajouterScript('utilisateurs.js');
			#ajout personnel :)
			$page->title = "Création d'un compte";
			$page->creation = 'YES'; //variable avec valeur bidon :D pour gérer le mode readonly
		}
		
		public function supprimerAction(){
			$page = Page::getPage();
			$page->id = filter_var(requete::get('id',0),FILTER_VALIDATE_INT);
			$utilisateur = new Utilisateurs;
			$utilisateur->supprimer($page->id);
			//redirection
			$this->rediriger("index.php?controller=utilisateurs&action=lister","Utilisateur supprimé");
		}
		
		public function deconnecterAction(){
			Authentification::deconnecter();
			$this->rediriger("index.php","");
		}
    }
?>
