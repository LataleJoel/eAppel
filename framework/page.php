<?php
defined('__FRAMEWORK3IL__') or die('Acces interdit');
    class Page{
        protected $vue='';
        protected $template='';
		protected $css= array();
		protected $scripts = array();
        private static $page = null;

        private function __construct() {
            
        }
        
        public static function getPage(){
            if(is_null(self::$page)=== true){
                self::$page = new Page();
            }
            return self::$page;
        }

        public function setVue($vue){
            $this->vue= $vue.'.view.php';
            if(!file_exists('application/views/'.$this->vue)){
                throw new Erreur('fichier de vue inexistant');
            }
        }
        
        public function setTemplate($template){
            $this->template= $template.'.template.php';
            if(!file_exists('application/templates/'.$this->template)){
                throw new Erreur('fichier de template inexistant');
            }
        }
        
        public function vue(){
            if($this->vue==''){
                throw new Erreur('Vue non renseignée');
            }
            require_once 'application/views/'.$this->vue;
        }
        
        public function afficher(){
            if($this->template==''){
                throw new Erreur('Template non renseigné');
            }
            require_once 'application/templates/'.$this->template;
        }
		
		public function ajouterCSS($fichiercss){
			if(file_exists('application/styles/'.$fichiercss) === false){
				throw new Erreur('le fichier css n\'existe pas');
			}
			$this->css[] = $fichiercss;
		}
		
		public function ajouterScript($fichier){
			if(file_exists('application/javascript/'.$fichier) === false){
				throw new Erreur('le fichier javascript n\'existe pas');
			}
			$this->scripts[] = $fichier;
		}
		
		public function linkCSS(){
			foreach($this->css as $tab){
				echo '<link rel="stylesheet" href="application/styles/'.$tab.'" type="text/css" />'; 
			}
		}
		
		public function linkScripts(){
			foreach($this->scripts as $tab){
				echo '<script src="application/javascript/'.$tab.'" type="text/javascript" ></script>'; 
			}
		}
        
    }
?>
