<?php 

class OvniDisco extends Ovni{
    public float $radio;

    public function __construct(int $velocidad, bool $camuflaje, float $radio) {
        parent::__construct($velocidad, $camuflaje);
        $this->radio = $radio;
    }

    public function pintarHTML() {
        return "<p>Soy un Disco con $this->radio radio, $this->velocidad km/h y camuflaje($this->camuflaje)";
    }

    public function cargarInfo($info) {
        $this->radio = $info['radio'];
        $this->velocidad = $info['velocidad'];
        $this->camuflaje = $info['camuflaje'];
    }

}