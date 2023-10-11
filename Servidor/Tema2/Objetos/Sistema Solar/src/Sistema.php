<?php

class Sistema {

    private $planetas;

    function __construct(){
        $this->planetas = [];
    }

    public function addPlaneta($planeta){
        $this->planetas[] = $planeta;
    }
}

?>