<?php

spl_autoload_register(function ($class) {
    $path = "./";
    $file = str_replace("\\", "/", $class);
    require("$path${file}.php");
});

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Objetos</title>
</head>

<body>
    <?php
        $facil = new Clases\ExamenFacil();
        $facil->intentar("Daniel");
        echo "Examen facil: ".$facil->obtenerNota() . "<br>";

        $chungo = new Clases\ExamenChungo();
        $chungo->intentar("Jason");
        echo "Examen chungo: ".$chungo->obtenerNota() . "<br>";

        $hp = new Clases\ExamenHP();
        $hp->intentar("Mario");
        echo "Examen HP: ".$hp->obtenerNota() . "<br>";
    ?>
</body>

</html>