<?php

/*
Debes definir una estructura adecuada para este problema
*/
const MIN = 1;
const MAX = 3;
$tablero = [];
$tablero = fetchTablero();

// print_r($_POST);

if (isset($_GET['restart'])) {
    unlink("tresenraya.csv");
    header("Location: ./index.php");
}

$turnos = ["X", "O"];

$posX = 1;
$posY = 1;
$turno;
$turnoSelected = "X";
$errores = [];
$endgame = false;

if (isset($_POST['submit'])) {
    $posX = $_POST['posx'];
    $posY = $_POST['posy'];
    $turno = $_POST['turno'];
    echo "$posX $posY $turno";

    if ($posX < MIN || $posX > MAX) {
        $errores[] = "La posicion dada no es válida";
    }

    if ($posY < MIN || $posY > MAX) {
        $errores[] = "La posicion dada no es válida";
    }

    if (!empty($tablero[$posY - 1][$posX - 1])) {
        $errores[] = "La posicion ya está seleccionada";
    }

    if (count($errores) == 0) {
        $tablero[$posY - 1][$posX - 1] = $turno;
        $turnoSelected = array_values(array_diff($turnos, array($turno)))[0];
        saveTablero($tablero);
    } else {
        $turnoSelected = $turnos[array_search($turno, $turnos)];
    }
}

function pintarTurnos($turnos, $turnoSelected, $endgame) {
?>
    Turno:
    <select name="turno" <?= ($endgame)?'disabled':'' ?>>
        <?php foreach ($turnos as $turno) : ?>
            <option value="<?= $turno ?>" <?= ($turno == $turnoSelected) ? 'selected' : '' ?>><?= $turno ?></option>
        <?php endforeach; ?>
    </select>
<?php
}

function saveTablero($tablero) {
    $file = '';
    if (!empty($tablero)) {
        foreach ($tablero as $fila) {
            $file .= implode(',', $fila) . ";";
        }
    } else {
        $tablero = array_fill(0, 3, array_fill(0, 3, ''));
    }

    file_put_contents('tresenraya.csv', $file);
}

function fetchTablero() {
    @$file = file_get_contents("tresenraya.csv");
    if ($file == false) {
        file_put_contents('tresenraya.csv', ",,;,,;,,;");
    }

    $file = file_get_contents("tresenraya.csv");

    $tablero = explode(";", $file);
    foreach ($tablero as &$fila) {
        $fila = explode(",", $fila);
    }

    array_pop($tablero);

    return $tablero;
}

function pintarTablero($tablero) {
?>
    <table>
        <?php foreach ($tablero as $fila) : ?>
            <tr>
                <?php foreach ($fila as $celda) : ?>
                    <td><?= $celda ?></td>
                <?php endforeach; ?>
            </tr>
        <?php endforeach; ?>
    </table>
    <?php
}

function pintarErrores($errores) {
    foreach ($errores as $error) :
    ?>
        <div class="error"><?= $error ?></div>
<?php
    endforeach;
}

function hasGanado($tablero) {
    // filas
    foreach ($tablero as $fila) {
        if (count(array_count_values($fila)) == 1) {
            return array_key_first(array_count_values($fila));
        }
    }

    // columnas
    for ($i=0; $i < count($tablero[0]); $i++) { 
        if (count(array_count_values(array_column($tablero, $i))) == 1) {
            return array_key_first(array_count_values(array_column($tablero, $i)));
        }
    }

    // diagonal 1
    $diagonal1 = [];
    for ($i=0; $i < count($tablero); $i++) { 
        $diagonal1[] = $tablero[$i][$i];
    }

    if (count(array_count_values($diagonal1)) == 1) {
        return array_key_first(array_count_values($diagonal1));
    }

    // diagonal 2
    $diagonal2 = [];
    for ($i=0; $i < count($tablero); $i++) { 
        $diagonal2[] = $tablero[(count($tablero) - 1) - $i][$i];
    }

    if (count(array_count_values($diagonal2)) == 1) {
        return array_key_first(array_count_values($diagonal2));
    }

    return false;
}

?>

<html>

<head>
    <link rel="stylesheet" type="text/css" media="all" href="css/estilo.css">
    <title>3 en Raya</title>
</head>

<body>
    <h1>3 en raya</h1>
    <?= pintarTablero($tablero) ?>
    <?= pintarErrores($errores) ?>
    <?php 
        $resultado = hasGanado($tablero);
        if($resultado != false) : 
            $endgame = true;
    ?>
        <div class="ganador">Ha ganado <?= $resultado ?></div>
        <a href="index.php?restart">Reinicia</a>
    <?php
        endif;
    ?>
    <form action="" method="POST">
        <?= pintarTurnos($turnos, $turnoSelected, $endgame) ?>
        <br>
        x: <input type="number" name="posx" value="<?= $posX ?>" min="<?= MIN ?>" max="<?= MAX ?>" <?= ($endgame)?'disabled':'' ?> ><br>
        y: <input type="number" name="posy" value="<?= $posY ?>" min="<?= MIN ?>" max="<?= MAX ?>" <?= ($endgame)?'disabled':'' ?> ><br>
        <button type="submit" name="submit" value="submit" <?= ($endgame)?'disabled':'' ?> >Jugar</button>
    </form>
</body>

</html>