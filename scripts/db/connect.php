<?php
    namespace App;
    class connect extends credentials{

        protected $conexion;
        function __construct( private $driver = "mysql", private $port = 3306){
            try{
                $this->conexion = new \PDO($this->driver.":host=".$this->__get('host').";port=".$this->port.";dbname=".$this->__get('dbname').";user=".$this->username.";password=".$this->password);
                $this->conexion->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
                
            } catch (\PDOException $e) {
                print_r($e->getMessage());
            }
        }
    }
?>