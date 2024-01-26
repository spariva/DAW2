<?php

class Persona{
    public $nombre;
    public $apellido;
    public $apellido2;
    public $edad;

    function __construct(string $nombre, string $apellido, string $apellido2, int $edad){
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->apellido2 = $apellido2;
        $this->edad = $edad;
    }


}