<?php

define("MIN", 9);
define("MAX", 22);

function pintaCabecera(...$cabeceras)
{
    $cadena = "<tr>";

    foreach ($cabeceras as $key => $value) {
        $cadena .= "<th>$value</th>";
    }

    $cadena .= "</tr>";
    return $cadena;
}

function pintaContenido(...$valores)
{
    $cadena = "<tr>";

    foreach ($valores as $key => $value) {
        $cadena .= "<td>$value</td>";
    }

    $cadena .= "</tr>";
    return $cadena;
}

function pintaHorario()
{
    $horas = [];
    for ($i = MIN; $i <= MAX; $i++) {
        $horas[] = $i;
    }

?>
    <table>
        <?= pintaCabecera("Hora", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes"); ?>
        <?php
            array_map(function ($hora) {
                echo pintaContenido(sprintf("%02d:00", $hora), "", "", "", "", "");
            }, $horas)
        ?>
    </table>
<?php
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Devuelven Cadenas</title>
    <style>
        td,
        th {
            border: 1px solid black;
        }
    </style>
</head>

<body>
    <?= pintaHorario() ?>
</body>

</html>