<?php 
define ('FILE_NAME', 'data.json');

class Avistamiento {
    public string $localizacion;
    public date $fecha;
    public time $hora;
    public string $notas;
    public Ovni $ovni;

    public function __construct($localizacion, $fecha, $hora, $notas, $ovni) {
        $this->localizacion = $localizacion;
        $this->fecha = $fecha;
        $this->hora = $hora;
        $this->notas = $notas;
        $this->ovni = $ovni;
    }

    public function pintarHTML() {
        return "<div style='width: 100px; height: 100px; background-color: black; border-radius: 50%;'></div>";
    }

    public function cargarInfo($info) {
        $this->localizacion = $info['localizacion'];
        $this->fecha = $info['fecha'];
        $this->hora = $info['hora'];
        $this->notas = $info['notas'];
        //$this->ovni = new Ovni($info['ovni']);
    }

}