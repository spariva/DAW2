<?php

$tablero;

inicializaSopaLetras($tablero, 6, 6);

function inicializaSopaLetras(&$tablero, $n, $m) {
    $tablero = [];
    for ($i=0; $i < $n; $i++) { 
        for ($j=0; $j < $m; $j++) { 
            $letra = chr(rand(ord('a'), ord('z')));
            
            $tablero[$i][$j] = $letra;
        }
    }
}

function pintaTablero($tablero) {
?>
    <table>
<?php   foreach ($tablero as $fila) : ?>
            <tr>
<?php           foreach ($fila as $celda) : ?>
                    <td><?= $celda ?></td>    
<?php           endforeach; ?>
            </tr>
<?php   endforeach; ?>
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
    <title>Arrays y funciones</title>
    <style>
        table {
            border-collapse: collapse;
            
        }

        td {
            padding: 2px 4px;
            text-align: center;
            border: 1px solid black;
        }
    </style>
</head>
<body>
    <?= pintaTablero($tablero) ?>
</body>
</html>