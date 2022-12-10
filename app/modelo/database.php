<?php
//include('../config.php');
 if(!class_exists('Database')){

/**
 * Clase de abstracción de base de datos de 'proyecto1ev'
 */

class Database { 
    
    public $pdo = null;
    public $db;   // handle of the db connexion    
     private static $dns = "mysql:host=localhost;dbname=proyecto1ev"; 
     private static $user = "root"; 
     private static $pass = "";     
    private static $instance;

    public function __construct ()  {        
       $this->db = new PDO(self::$dns,self::$user,self::$pass);       
    } 

    public static function getInstance(){ 
        if(!isset(self::$instance)) 
        { 
            $object= __CLASS__; 
            self::$instance=new $object; 
        } 
        return self::$instance; 
    }  

    public function pdo(){
		return $this->pdo;
	}
} 

}