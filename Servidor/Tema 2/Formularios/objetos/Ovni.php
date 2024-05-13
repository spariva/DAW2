<?php 

abstract class Ovni {
    private int $velocidad;
    private bool $camuflaje;

    public function __construct($velocidad, $camuflaje) {
        $this->velocidad = $velocidad;
        $this->camuflaje = $camuflaje;
    }

    public function getVelocidad() {
        return $this->velocidad;
    }

    public function setVelocidad($velocidad) {
        $this->velocidad = $velocidad;
    }

    public function getCamuflaje() {
        return $this->camuflaje;
    }

    public function setCamuflaje($camuflaje) {
        $this->camuflaje = $camuflaje;
    }

    abstract public function pintarHTML();

    abstract public function cargarInfo($info);

}