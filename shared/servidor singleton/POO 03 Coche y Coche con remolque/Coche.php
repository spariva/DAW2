<?php

class Coche
{
    private $matricula;
    private $marca;
    private $carga;

    public function __construct(string $matricula, string $marca, string $carga)
    {
        $this->matricula = $matricula;
        $this->marca = $marca;
        $this->carga = $carga;
    }

    function pintarInformacion()
    {
        return "Coche [$this->matricula] marca: $this->marca carga: $this->carga";
    }

    //SETTERS
    public function setMatricula(string $matricula)
    {
        $this->matricula = $matricula;
    }

    public function setMarca(string $marca)
    {
        $this->marca = $marca;
    }

    public function setCarga(string $carga)
    {
        $this->carga = $carga;
    }


    //GETTERS
    public function getmatricula()
    {
        return $this->matricula;
    }

    public function getMarca()
    {
        return $this->marca;
    }

    public function getCarga()
    {
        return $this->carga;
    }

}

?>