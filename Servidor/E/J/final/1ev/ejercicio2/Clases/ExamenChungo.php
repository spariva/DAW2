<?php

namespace Clases;

class ExamenChungo extends AExamen
{
    private const MIN = 0;
    private const MAX = 7;

    function obtenerNota(): int
    {
        return rand(self::MIN, self::MAX);
    }
}
