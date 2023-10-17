<?php

class CocheGrua extends Coche{
    private Coche cocheCargado;

    public __construct(string $matricula, string $marca, float $carga, Coche $cocheCargado){
        parent::__construct($matricula, $marca, $carga);
        $this->cocheCargado = $cocheCargado;
    }

    public pintarRemolque(){
        if(isset($this->cocheCargado)){
            return parent::pintarInformacion(). "<br>Lleva coche: ". $this->cocheCargado->parent::pintarInformacion();//?
        }
        return parent::pintarInformacion(). "<br> No lleva ningún coche."
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

    public pintar

    public function getCocheCargado(){
        return $this->cocheCargado;
    }

    public function setCocheCargado($cocheCargado){
        $this->coche$cocheCargado = $cocheCargado;
    }  

}

?>