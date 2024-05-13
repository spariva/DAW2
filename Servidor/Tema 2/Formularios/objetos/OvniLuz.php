<?php 

class OvniLuz extends Ovni{
    public $duracionLuz;

    public function __construct($velocidad, $camuflaje, $duracionLuz) {
        parent::__construct($velocidad, $camuflaje);
        $this->duracionLuz = $duracionLuz;
    }

    public function pintarHTML() {
        return "<div style='width: 100px; height: 100px; background-color: black; border-radius: 50%;'></div>";
    }

    public function cargarInfo($info) {
        $this->duracionLuz = $info['duracionLuz'];
        $this->velocidad = $info['velocidad'];
        $this->camuflaje = $info['camuflaje'];
    }

}