<?php

class CocheRemolque extends Coche{
    private float $capacidadRemolque;

    public function __construct(string $matricula, string $marca, float $carga, float $capacidadRemolque){
        parent::__construct($matricula, $marca, $carga);
        $this->capacidadRemolque = $capacidadRemolque;
    }

    public function pintarRemolque(){
        return parent::pintarInformacion(). "<br>Capacidad Remolque: ". $this->getCapacidadRemolque();
    }

    public function getCapacidadRemolque(){
        return $this->capacidadRemolque;
    }


    public function setCapacidadRemolque($capacidadRemolque){
        $this->capacidadRemolque = $capacidadRemolque;
    }  

}

?>