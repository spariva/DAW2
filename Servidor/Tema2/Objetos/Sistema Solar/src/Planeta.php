<?php
class Planeta{
    private $nombre;    
    private $masa;
    private $diametro;
    private $distanciaSol;

    public function __construct($nombre, $masa, $diametro, $distanciaSol){
        $this->nombre = $nombre;
        $this->masa = $masa;
        $this->diametro = $diametro;
        $this->distanciaSol = $distanciaSol;
    }

    public function savePlanetOnFile(){
        if(!file_exists("planetas.txt")){
            $file = fopen("planetas.txt", "w");
            fclose($file);
        }
        $file = fopen("planetas.txt", "a");
        fwrite($file, $this->nombre." ".$this->masa." ".$this->diametro." ".$this->distanciaSol."\n");
        fclose($file);
    }

    public function loadPlanetFromFile(){
        $file = fopen("planetas.txt", "r");
        $planetas = [];
        //le he preguntado a la ia y me ha dicho esto pero no acabo de entenderlo
        while(!feof($file)){
            $linea = fgets($file);
            $planeta = explode(" ", $linea);
            $planetas[] = new Planeta($planeta[0], $planeta[1], $planeta[2], $planeta[3]);
        }
        fclose($file);
        return $planetas;
    }

    //getters y setters
    public function getNombre(){
        return $this->nombre;
    }

    public function getMasa(){
        return $this->masa;
    }

    public function getDiametro(){
        return $this->diametro;
    }

    public function getDistanciaSol(){
        return $this->distanciaSol;
    }

    public function setNombre($nombre){
        $this->nombre = $nombre;
    }  

    public function setMasa($masa){
        $this->masa = $masa;
    }

    public function setDiametro($diametro){
        $this->diametro = $diametro;
    }

    public function setDistanciaSol($distanciaSol){
        $this->distanciaSol = $distanciaSol;
    }
}

?>