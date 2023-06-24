<?php
    namespace App;
    trait system {
        public function __get($name) {
            return $this->{$name};
        }
    }
    trait getInstance{
        static $instance;
        static function getInstance(){
            $arg = func_get_args();
            $arg = array_pop($arg);
            if (self::$instance == null){
                self::$instance = new self(...(array) $arg);
            }
            return self::$instance;
        }
        function __set($name, $value){
            $this->name = $value;
        }
    }
    
    

?>