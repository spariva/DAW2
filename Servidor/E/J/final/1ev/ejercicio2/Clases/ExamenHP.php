<?php

namespace Clases;

class ExamenHP extends AExamen
{
    private const MIN = 4;
    private const MAX = 4.5;

    function obtenerNota(): int
    {
        return rand(self::MIN, self::MAX);
    }
}
