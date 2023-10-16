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
        savePlanetOnFile($this);
    }

    //public function addPlaneta

    public function __toString() {
        return "Nombre: ".$this->nombre."<br>Masa: ".$this->masa."<br>Diametro: ".$this->diametro."<br>Distancia al sol: ".$this->distanciaSol;
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
        while(!feof($file)){//mientras no llegue al final del archivo/siga abierto es el feof
            $linea = fgets($file);
            $planeta = explode(" ", $linea);//separa la linea por espacios y lo guarda en un array
            $planetas[] = new Planeta($planeta[0], $planeta[1], $planeta[2], $planeta[3]);
        }
        fclose($file);
        return $planetas;
    }

    public function printDiv(string $container = "div", string $etiqueta = "span")
    {
      echo "<$container>";
      echo "<$etiqueta>Nombre: $this->nombre</$etiqueta>";
      echo "<$etiqueta>Masa: $this->masa</$etiqueta>";
      echo "<$etiqueta>Diametro: $this->diametro</$etiqueta>";
      echo "<$etiqueta>Distancia al Sol: $this->distanciaSol</$etiqueta>";
      echo "</$container>";
    }

    public function printFila(string $container = "tr", string $etiqueta = "td")
    {
      echo "<$container>";
      echo "<$etiqueta>Nombre: $this->nombre</$etiqueta>";
      echo "<$etiqueta>Masa: $this->masa</$etiqueta>";
      echo "<$etiqueta>Diametro: $this->diametro</$etiqueta>";
      echo "<$etiqueta>Distancia al Sol: $this->distanciaSol</$etiqueta>";
      echo "</$container>";
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