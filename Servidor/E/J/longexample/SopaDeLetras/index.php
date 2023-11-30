<?php
    spl_autoload_register(function($class) {
        $path = "./";
        $file = str_replace("\\", "/", $class);
        require("$path${file}.php");
    });

    $tablero = new Tablero();
    $tablero->inicializaSopaLetras(6,6);
    $tablero->colocaPalabra("jason")
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sopa de Letras</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <main class="main">
        <h3>Sopa de Letras</h3>
        <?= $tablero->pintaTablero() ?>
    </main>
</body>
</html>