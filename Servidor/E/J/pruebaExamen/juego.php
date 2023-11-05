<?php

/*
Debes definir una estructura adecuada para este problema
*/
$tablero = [];

// if(!empty($_GET['reiniciar'])) {
//     reiniciar($tablero);
// }

$tablero = fetchTablero();

$posx = 1;
$posy = 1;
$turnos = ['X', 'O'];
$errores = [];

print_r($_POST);
print_r($tablero);

if(!empty($_POST['submit'])) {
    $posx = $_POST['posx'];
    $posy = $_POST['posy'];
    $turno = $_POST['turno'];

    if ($posx < 1 || $posx > 3) {
        $errores['posicion'] = 'Escoja una posicion valida';
    }
    if ($posy < 1 || $posy > 3) {
        $errores['posicion'] = 'Escoja una posicion valida';
    }
    if (!in_array($turno, $turnos)) {
        $errores['turno'] = 'Escoja un turno valido';
    }
    
    if(!empty($tablero[$posy-1][$posx-1])) {
        $errores['campo'] = 'El campo ya está seleccionado';
    }

    if (count($errores) == 0) {
        $tablero[$posy-1][$posx-1] = $turno;
        saveTablero($tablero);
    }
}

function saveTablero($tablero) {
    $file = '';
    if (!empty($tablero)) {
        foreach ($tablero as $fila) {
            $file .= implode(',',$fila).";";
        }
    } else {
        $tablero = array_fill(0, 3, array_fill(0,3, ''));
    }
    
    file_put_contents('tablero.csv', $file);
}

function fetchTablero() {
    $file = file_get_contents('tablero.csv');
    if ($file == false) {
        file_put_contents('tablero.csv', ",,;,,;,,;");
    }
    $file = file_get_contents('tablero.csv');
     
    $tablero = explode(';', $file);
    foreach ($tablero as &$fila) {
        $fila = explode(',', $fila);
    }

    array_pop($tablero);

    return $tablero;
}

function reiniciar($tablero) {
    file_put_contents('tablero.csv', ",,;,,;,,;");
}

function pintarTablero($tablero) { ?>
    <table>
        <?php foreach ($tablero as $key => $fila) : ?>
            <tr>
                <?php foreach ($fila as $key => $celda) :?> 
                    <td><?= $celda ?></td>
                <?php endforeach; ?> 
            </tr>
        <?php endforeach; ?>
  </table>
<?php
}

function imprimirTurnos($turnos, $turnoPost) {
?>
    <select name="turno">
        <?php foreach ($turnos as $turno) :?>
            <option value="<?= $turno ?>" <?= ($turno == $turnoPost)?'selected':''; ?> ><?= $turno ?></option>
        <?php endforeach; ?>
    </select>
<?php
}

function imprimirErrores($errores) {
    foreach ($errores as $key => $value) : ?>
        <p class="error"><?= $value ?></p>
<?php    
    endforeach;
}

function haGanado($tablero) {
    $ganador = [];

    foreach ($tablero as $key => $fila) {
        $fila = array_diff($fila, array(''));
        array_count_values($fila);
      

    }
}

?>

<html>
<head>
  <link rel="stylesheet" type="text/css" media="all" href="css/estilo.css">
  <title>3 en Raya</title>
  <style>
    * {
      font-family: arial;
    }

    td {
        width: 12px;
        height: 35px;
    }
  </style>
</head>
<body>
  <h1>3 en raya</h1>
    <?php pintarTablero($tablero) ?>
    <?php imprimirErrores($errores) ?>
    <?php haGanado($tablero) ?>
  <p class="error">
    Jugador AAA ha ganado
    <a href="./juego.php?reiniciar=1">Juego nuevo</a>
  </p>
  <form action="" method="post">
      turno:
      <?= imprimirTurnos($turnos, $turno) ?>
      <br>
      x: <input type="number" name="posx" value="<?= $posx ?>" step="1" min="1" max="3"><br>
      y: <input type="number" name="posy" value="<?= $posy ?>" step="1" min="1" max="3"><br>
      <!-- <input type="hidden" name="tablero" value="TODO_PONER_VALOR"><br> -->
      <button type="submit" name="submit" value="submit">Jugar</button>
  </form>
</body>
</html>
