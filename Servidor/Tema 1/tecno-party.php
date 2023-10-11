<?php 
$numFranjas = (isset($_GET["number"])?$_GET["number"]:1);
// Si no se ha enviado el número de franjas, se pone a 1. Si sí, 

    function hexadecimal() {
        $hexadecimal = "#";
        $caracteres = "0123456789ABCDEF";
        //global $numFranjas; Esta variable es para el for que printea las franjas.
        // Anyways : Necesitaría declararlo global para poder usarlo dentro de la función.
        // O bien, pasarle el parámetro $numFranjas a la función.
        // O bien, usar $_GET["number"] dentro de la función.
        for ($i = 0; $i < 6; $i++) {
            $hexadecimal .= $caracteres[rand(0, 15)];
        }
        return $hexadecimal;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tecnoo party</title>
    <style>
    .contenedor {
        width: 100vh;
        height: 100vh;
        align-items: center;
    }
    .a {
        background-color: <?= hexadecimal()?>;
    }
</style>
</head>
<body>
<div class="contenedor">
    <form action="tecno-party.php" method="GET">
        <p>Número de franjas: </p><input type="number" name="number">
        Enviar: <input type="submit">
    </form>
</div>

    <?php for($i = 0; $i < $numFranjas; $i++) : ?>
    <div style='width: 20%; height: 100%; display: inline-block; background-color: " . hexadecimal() . ";'></div>
    <?php endfor ?>
    <?php 
    for($i = 0; $i < $numFranjas; $i++){
        echo "<div  class='a' style= height: 100%; display: inline-block; background-color: " . hexadecimal() . ";'> " . hexadecimal() . " </div>";
        
    }
    ?>
</body>
</html>