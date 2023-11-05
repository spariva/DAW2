<?php

namespace Trait;

trait TieneFecha
{
    protected $fecha;

    function getFecha()
    {
        return $this->fecha;
    }

    function setfecha($fecha)
    {
        $this->fecha = $fecha;
    }
}
