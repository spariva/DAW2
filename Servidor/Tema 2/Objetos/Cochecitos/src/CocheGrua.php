<?php

class CocheGrua extends Coche{
    private Coche $cocheCargado;

    public function __construct(string $matricula, string $marca, float $carga, Coche $cocheCargado){
        parent::__construct($matricula, $marca, $carga);
        $this->cocheCargado = $cocheCargado;
    }

    public function pintarRemolque(){
        if(isset($this->cocheCargado)){
            return parent::pintarInformacion(). "<br>Lleva coche: ". $this->cocheCargado->parent::pintarInformacion();//?
        }
        return parent::pintarInformacion(). "<br> No lleva ningún coche.";
    }

    public function cargar($cocheCargado){
        if(!isset($this->cocheCargado)){
            $this->cocheCargado = $cocheCargado;
        }
    }

    public function descargar(){
        if(isset($this->cocheCargado)){
            $this->cocheCargado = null;
        }  
    }


    public function getCocheCargado(){
        return $this->cocheCargado;
    }

    public function setCocheCargado($cocheCargado){
        $this->$cocheCargado = $cocheCargado;
    }  

}

?>