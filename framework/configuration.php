<?php
    defined('__FRAMEWORK3IL__') or die('Acces interdit');
    class Configuration{
        private $data = null;
        private static $_configuration = null;
        
        private function __construct($fichier){
            if(file_exists($fichier)=== false)
            {
                die('le fichier n\'existe pas!!!');
            }
            $this->data = parse_ini_file($fichier);
            if($this->data === false){
                die('le fichier n\'a pas été lu');
            }
        }
        
        static public function getConfig($fichier = ''){
            if(is_null(self::$_configuration) === true){
                self::$_configuration = new Configuration($fichier);
            }
            return self::$_configuration;
        }
        
        
        public function __get($propriete){
            if(isset($this->data[$propriete]) === false){
                die('aucune donnée n\'a été transmise');
            }
            return $this->data[$propriete];
        }
    }
?>
