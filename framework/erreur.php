<?php
    defined('__FRAMEWORK3IL__') or die('Acces interdit');
    class Erreur extends Exception{
        public function __contruct($message){
            parent::__construct($message);
        }
        
        public function __toString(){
            $cfg = Configuration::getConfig();
            $trace = $this->getTrace();
            if($cfg->debugMode == 1){
                require 'erreur_debug.php';
            }else{
                require 'erreur_production.php';
            }
            die();
        }
    }
?>
