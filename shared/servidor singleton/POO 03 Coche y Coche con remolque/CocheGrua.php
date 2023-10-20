<?php

class CocheGrua extends Coche
{
    private $cocheCargado;

    public function __construct(string $matricula, string $marca, string $carga, bool $cocheCargado=false)
    {
        parent::__construct($matricula, $marca, $carga);
        $this->cocheCargado = $cocheCargado;
    }

    public function pintarInformacion()
    {
        $vehiculoInfo = parent::pintarInformacion(); // Llama al método toString de la clase Coche
        return "$vehiculoInfo, Coche cargado: $this->cocheCargado";
    }

    //GETTERS y SETTERS
    public function getCocheCargado()
    {
        return $this->cocheCargado;
    }
    public function setCocheCargado($cocheCargado)
    {
        $this->cocheCargado = $cocheCargado;
    }
}
?>