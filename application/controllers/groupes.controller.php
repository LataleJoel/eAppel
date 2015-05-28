<?php
    defined('__EAPPEL__') or die('Acces interdit');
	require_once 'application/data/groupes.data.php';
	
	class GroupesController extends Controleur{
        
        public function __construct(){
            parent::__construct('lister');
        }
		
		public function _preAction(){
			if(Authentification::estConnecte() === false)
				$this->rediriger("index.php","");
		}
		
		 public function listerAction(){
			$groupe = new Groupes();
            $page = Page::getPage();
            $page->setTemplate('application');
            $page->setVue('groupes');
			#ajout personnel :)
			$page->title = "Liste des groupes";
			//récupération de la liste des groupes
			$page->groupes = $groupe->lister();
			//ajout des styles et JS adaptés à la vue
			$page->ajouterCSS('liste_groupes.css');
			$page->ajouterScript('jquery-1.10.2.min.js');
			$page->ajouterScript('jquery-1.10.2.min.map');
			$page->ajouterScript('liste_groupes.js');
        }
		
		public function detailAction(){
			$page = Page::getPage();
			$page->setTemplate('ajax');
			$page->setVue('groupe_ajax');
			$id = Requete::get('id',0);
			if(!filter_var($id,FILTER_VALIDATE_INT)){
				die('erreur');
			}
			$TGroupes = new Groupes();
			$groupe = $TGroupes->getGroupe($id);
			$page->data = json_decode($groupe['eleves']);
			$page->groupe = $groupe['groupe'];
		}
	}
?>