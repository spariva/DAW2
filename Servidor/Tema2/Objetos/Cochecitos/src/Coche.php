<?php
class Coche{
    private string $matricula;
    private string $marca;
    private float $carga;

    public function __construct(string $matricula, string $marca, float $carga){
        $this->matricula = $matricula;
        $this->marca = $marca;
        $this->carga = $carga;
    }

    public function pintarInformacion() {
        return "Matricula: ".$this->matricula."<br>Marca: ".$this->marca."<br>Carga: ".$this->carga;
    }


    public function printDiv(string $container = "div", string $etiqueta = "span")
    {
      echo "<$container>";
      echo "<$etiqueta>Matricula: $this->matricula</$etiqueta>";
      echo "<$etiqueta>Marca: $this->marca</$etiqueta>";
      echo "<$etiqueta>Carga: $this->carga</$etiqueta>";
      echo "</$container>";
    }

    public function printFila(string $container = "tr", string $etiqueta = "td")
    {
      echo "<$container>";
      echo "<$etiqueta>Matricula: $this->matricula</$etiqueta>";
      echo "<$etiqueta>Marca: $this->marca</$etiqueta>";
      echo "<$etiqueta>Carga: $this->carga</$etiqueta>";
      echo "</$container>";
    }

    //getters y setters
    public function getMatricula(){
        return $this->matricula;
    }

    public function getMarca(){
        return $this->marca;
    }

    public function getCarga(){
        return $this->carga;
    }


    public function setMatricula($matricula){
        $this->matricula = $matricula;
    }  

    public function setMarca($marca){
        $this->marca = $marca;
    }

    public function setCarga($carga){
        $this->carga = $carga;
    }
}

?>