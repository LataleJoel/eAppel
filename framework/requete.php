<?php
 defined('__FRAMEWORK3IL__') or die('Acces interdit');

    final class Requete{
        private static function fetch($tab,$item,$default=null){
            if(isset($tab[$item])){
                return $tab[$item];
            }
            return $default;
        }
        
        public static function get($item,$default=null){
            return self::fetch($_GET, $item,$default);
        }
        
        public static function post($item,$default=null){
            return self::fetch($_POST, $item,$default);
        }
    }
?>
