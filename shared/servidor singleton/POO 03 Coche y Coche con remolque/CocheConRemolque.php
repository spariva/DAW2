<?php

class CocheConRemolque extends Coche
{
    private $capacidadRemolque;

    public function __construct(string $matricula, string $marca, string $carga, string $capacidadRemolque)
    {
        parent::__construct($matricula, $marca, $carga);
        $this->capacidadRemolque = $capacidadRemolque;
    }

    public function pintarInformacion()
    {
        $vehiculoInfo = parent::pintarInformacion(); // Llama al método toString de la clase Coche
        return "$vehiculoInfo, Cap del Remolque: $this->capacidadRemolque";
    }

    //TODO
    /*public function cargarCoche(Coche $coche){

    }*/

    /*public function descargar(){

    }*/


    //GETTERS y SETTERS
    public function getCapacidadRemolque()
    {
        return $this->capacidadRemolque;
    }
    public function setCapacidadRemolque(string $capacidadRemolque)
    {
        $this->capacidadRemolque = $capacidadRemolque;
    }
}
?>