<?php
class OvniCigarro extends Ovni{
    public int $longitud;

    public function __construct(int $velocidad, bool $camuflaje, int $longitud) {
        parent::__construct($velocidad, $camuflaje);
        $this->longitud = $longitud;
    }

    public function pintarHTML() {
        return "<div style='width: 100px; height: 100px; background-color: black; border-radius: 50%;'></div>";
    }

    public function cargarInfo($info) {
        $this->longitud = $info['longitud'];
        $this->velocidad = $info['velocidad'];
        $this->camuflaje = $info['camuflaje'];
    }

}