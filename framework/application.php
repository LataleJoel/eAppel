<?php
define('__FRAMEWORK3IL__','');
session_start();
require_once 'configuration.php' ;
require_once 'datatable.php';
require_once 'erreur.php';
require_once 'requete.php';
require_once 'page.php'; 
require_once 'controleur.php';
require_once 'message.php';
require_once 'authentification.php';

class Application { 
    private static $_application = null; //appartient à la classe et non aux objets
    public $db = null; //appartient aux objets
    private $controleurParDefaut = null;
	private $controleurA = null;
	private $actionA = null;
    
    private function __construct($fichierIni){
        $config = Configuration::getConfig($fichierIni);
       
        try{
            $this->db = new PDO('mysql:host='.$config->db_hostname.';dbname='.$config->db_database,$config->db_username,$config->db_password);
        }catch(PDOException $exception){
            //die('Erreur de connexion à la base de données');
            throw new Erreur("message");
        }
        $this->db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
      
    }
    
    public static function getApplication($fichierIni=''){
        if(is_null(self::$_application) === true){
            self::$_application = new Application($fichierIni);
        }
        return self::$_application;
    }
    
    public function getDB(){
        return $this->db;
    }
    
    public function setControleurParDefaut($controleur){
        $this->controleurParDefaut = $controleur;
    }
    
    public function lancer(){
        $controleur = Requete::get('controller', $this->controleurParDefaut);
		$this->controleurA = $controleur; //mémorisation du controleur actif
        if(file_exists('application/controllers/'.$controleur.'.controller.php')){
            require_once 'application/controllers/'.$controleur.'.controller.php';
        }
        else{
            throw new Erreur('controleur invalide');
        }
        if(class_exists($controleur.'Controller') === false){
            throw new Erreur('classe inexistante');
        }
        $class = $controleur.'Controller';
        $controller = new $class();
        $action = Requete::get('action',$controller->getActionParDefaut());
		$this->actionA = $action; //mémorisation de l'action courante
        $controller->executer($action);
        $page = Page::getPage();
        $page->afficher();
    }
	
	public static function getControleur(){
		if(is_null(self::$_application) === true)
			die('l\'application n\'est pas chargé!!');
		return self::$_application->controleurA;
	}
	
	public static function getAction(){
		if(is_null(self::$_application) === true)
			die('l\'application n\'est pas chargé!!');
		return self::$_application->actionA;
	}
	
	public static function getURL(){
		if($_server['SERVER_PORT'] = 80)
			return htmlspecialchars('http://'.$_SERVER['HTTP_HOST'].''.$_SERVER['SCRIPT_NAME'].'?controller='.self::getControleur().'&action='.self::getAction());
		else
			return htmlspecialchars('http://'.$_SERVER['HTTP_HOST'].':'.$_server['SERVER_PORT'].''.$_SERVER['SCRIPT_NAME'].'?controller='.self::getControleur().'&action='.self::getAction());
	}
	
	public static function configurerAuthentification(){
		$config = Configuration::getConfig();
		Authentification::getAuthentification($config->auth_table,$config->auth_identifiant,$config->auth_login,$config->auth_motdepasse);
	}
}

?>
