<?php

namespace Clases;

interface IExamen
{
    function intentar(string $nombre);
    function obtenerNota(): int;
}
