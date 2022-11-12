<?php

class DBConnectionManager {

    private $conn;
    private $host;
    private $username;
    private $password;
    private $dbname;

    function __construct(){
        $config = simplexml_load_file(__DIR__.'/config.xml.');

        $this->host = $config->host;
        $this->username = $config->username;
        $this->password = $config->password;
        $this->dbname = $config->dbname;
    }

    function getConnection(){
        try{
			
            $this->conn = new PDO("mysql:host=".$this->host.";dbname=".$this->dbname,$this->username,$this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            
        } catch(PDOException $exception){
            
            echo "Database Connection error: " . $exception->getMessage();
           
       }         

       return $this->conn;
    }

}

?>