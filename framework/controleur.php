<?php
    defined('__FRAMEWORK3IL__') or die('Acces interdit');
    abstract class Controleur{
        protected $actionParDefaut = '';
        
        public function __construct($action){
            $this->setActionparDefaut($action);
        }
		
		protected function _preAction(){
			
		}
		
        public function executer($action=''){
            $methode = $action.'Action';
            if(method_exists($this, $methode)){ 
				$this->_preAction();
                $this->$methode();
                
            }else{ 
                throw new Erreur('Méthode inexistante!');
            }
        }
        
        public function getActionParDefaut(){
            return $this->actionParDefaut;
        }
        
        public function setActionparDefaut($action){
            $this->actionParDefaut = $action;
        }
		
		public function rediriger($url,$message=''){
			if($message != '')
				Message::deposer($message);
			if (!headers_sent()) {
			header('Location:' . $url);
			} else {
			?>
			<script type = "text/javascript">
				window.location = '<?php echo $url; ?>';
			</script>
			<?php
			}
		}
    }
?>
