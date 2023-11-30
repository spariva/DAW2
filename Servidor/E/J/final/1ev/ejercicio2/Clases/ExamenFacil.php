<?php

namespace Clases;

class ExamenFacil extends AExamen
{
    private const MIN = 5;
    private const MAX = 10;

    function obtenerNota(): int
    {
        return rand(self::MIN, self::MAX);
    }
}
