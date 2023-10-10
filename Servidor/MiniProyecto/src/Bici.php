<?php

class Bici {
    private $numRuedas;
    const static $NUM_RUEDAS_DEFECTO = 2;

    function __construct($numRuedas = Bici:: NUM_RUEDAS_DEFECTO){
        $this->numRuedas = $numRuedas;
    }

    function __toString(){
        return "Soy una bici con $this->numRuedas ruedas";
    }
}

?>