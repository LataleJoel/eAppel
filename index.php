<?php
    define('__EAPPEL__','');
    require_once 'framework/application.php';
  
    
    $application = Application::getApplication('application/config.ini');
    $application->setControleurParDefaut('index');
	#configuration de l'authentification
	Application::configurerAuthentification();
    $application->lancer();
    
    
?>
