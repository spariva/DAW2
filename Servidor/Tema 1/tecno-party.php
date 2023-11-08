<?php 
$numFranjas = (isset($_GET["number"])?$_GET["number"]:5);

function hexadecimal()
{
    $hexadecimal = "#";
    $caracteres = "0123456789ABCDEF";

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
    <meta http-equiv="refresh" content="1.7">
    <title>Tecno party</title>
    <style>
        body {
        margin: 0;
        padding: 0;
        display: flex;
        flex-direction: row;
        height: 100vh;
    }

    .tecno-div {
        flex: 1;
    }
</style>
</head>
<body>
<div class="contenedor">
    <form action="tecno-party.php" method="get">
        <p>Número de franjas: </p><input type="number" name="number">
        Enviar: <input type="submit">
    </form>
</div> 
    <?php for($i = 0; $i < $numFranjas; $i++) : ?>
    <div class="tecno-div" style='width: 20%; height: 100%; display: inline-block; background-color:  <?= $col = hexadecimal() ?> ;'><?= $col ?></div>
    <?php endfor ?>
</body>
</html>