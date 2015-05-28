<?php 
	defined('__FRAMEWORK3IL__') or die('Acces interdit');
	
	class Message{
		public static function deposer($message){
			$_SESSION['framework3IL.message'] = htmlentities($message);
		}
		
		public static function retirer(){
			$message = '';
			if(isset($_SESSION['framework3IL.message'])){
				$message = $_SESSION['framework3IL.message'];
				unset($_SESSION['framework3IL.message']);
			}
			return $message;
		}
	}
?>