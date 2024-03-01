<?php 
class Partido {
    public Persona $persona1;
    public Persona $persona2;
    public $resultado;
    public $horaDeJuego;

    public function __construct(Persona $persona1, Persona $persona2, string $resultado, string $horaDeJuego) {
        $this->persona1 = $persona1;
        $this->persona2 = $persona2;
        $this->resultado = $resultado;
        $this->horaDeJuego = $horaDeJuego;
    }


}