<?php 
class Partido {
    public $persona1;
    public $persona2;
    public $resultado;
    public $horaDeJuego;

    public function __construct(Persona $persona1, $persona2, string $resultado, $horaDeJuego) {
        $this->persona1 = $persona1;
        $this->persona2 = $persona2;
        $this->resultado = $resultado;
        $this->horaDeJuego = $horaDeJuego;
    }


}