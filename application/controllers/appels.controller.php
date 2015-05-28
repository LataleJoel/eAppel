<?php
    defined('__EAPPEL__') or die('Acces interdit');
	
	class AppelsController extends Controleur{
        
        public function __construct(){
            parent::__construct('choixGroupe');
        }
		
		public function _preAction(){
			if(Authentification::estConnecte() === false)
				$this->rediriger("index.php","");
		}
		
		public function choixGroupeAction(){
            $page = Page::getPage();
            $page->setTemplate('application');
            $page->setVue('choix_groupe');
			#ajout personnel :)
			$page->title = "Choix d'un groupe";
        }
		
		public function listerAction(){
            $page = Page::getPage();
            $page->setTemplate('application');
            $page->setVue('appels');
			#ajout personnel :)
			$page->title = "Liste des appels";
        }
	}
?>