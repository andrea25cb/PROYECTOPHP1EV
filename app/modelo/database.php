<?php
/** 
* @author andrea cordon
*/

//include('../config.php');
 if(!class_exists('Database')){

/**
 * Clase de abstracción de base de datos de 'proyecto1ev'
 */

/**
 * [Description Database]
 */
class Database { 
    
    /**
     * @var null
     */
    public $pdo = null;
    /**
     * @var [type]
     */
    /**
     * @var [type]
     */
    public $db;   // handle of the db connexion    
     /**
      * @var [type]
      */
     private static $dns = "mysql:host=localhost;dbname=proyecto1ev"; 
     /**
      * @var string
      */
     /**
      * @var string
      */
     private static $user = "root"; 
     private static $pass = "";     
    /**
     * @var [type]
     */
    private static $instance;

    /**
     */
    public function __construct ()  {        
       $this->db = new PDO(self::$dns,self::$user,self::$pass);       
    } 

    /**
     * @return [type]
     */
    public static function getInstance(){ 
        if(!isset(self::$instance)) 
        { 
            $object= __CLASS__; 
            self::$instance=new $object; 
        } 
        return self::$instance; 
    }  

    /**
     * @return [type]
     */
    public function pdo(){
		return $this->pdo;
	}
} 

}