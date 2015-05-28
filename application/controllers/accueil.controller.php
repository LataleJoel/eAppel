<?php
    defined('__EAPPEL__') or die('Acces interdit');
	
	class AccueilController extends Controleur{
        
        public function __construct(){
            parent::__construct('accueil');
        }
		
		public function _preAction(){
			if(Authentification::estConnecte() === false)
				$this->rediriger("index.php","");
		}
		
		 public function accueilAction(){
            $page = Page::getPage();
            $page->setTemplate('application');
            $page->setVue('accueil');
			#ajout personnel :)
			$page->title = "Accueil";
        }
	}
?>