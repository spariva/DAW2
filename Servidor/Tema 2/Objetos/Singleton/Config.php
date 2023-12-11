<?php
class Config{
    private static $varSingleton;
    public  $nombre;

    public static function singleton(){
        if(!isset(self::$varSingleton)){
            $varSingleton = new Config();    
        }
        return self::$varSingleton;
    }
    private function __construct() {}

    public function setNombre($nombre){
        $this->nombre = $nombre;
    }

    public function getNombre(){
        return $this->nombre;
    }
}       

?>