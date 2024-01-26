<?php
include("funciones.php");

define ('NUMERO_JUGADORES', 4);

$jugadores = randomPeople(NUMERO_JUGADORES);
$arrayPartidos = generateMatches($jugadores);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Partidos petanca</title>
</head>
<body>
<div class="tabla">
    <table border="1">
    <tr>
        <th>Lista de Partidos</th>
    </tr>
    <tr>
    <td><?php echo implode("</td></tr><tr><td>", $arrayPartidos); ?></td>
    </tr>
    </table>
    <!-- array_walk(
        $opcionesMinuto,
        function($op, $k, $d){
            $sel = ($op==$d)?"selected":"";
            echo "<option value='$op' $sel>$op</option>";
        },
        $min
    ); -->
    </div>
</body>
</html>