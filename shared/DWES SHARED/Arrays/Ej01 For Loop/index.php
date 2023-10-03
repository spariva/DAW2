<?php
    $arrayFrutas = array ("Platano","Naranja","Pomelo","Manzana");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>For Loop</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <!-- Primero como lista -->
    <div class="lista">
    <ul>
        <?php for ($i = 0; $i < count($arrayFrutas); $i++) : ?>
            <li><?php echo $arrayFrutas[$i]; ?></li>
        <?php endfor; ?>
    </ul>
    </div>
    <br>

    <!-- Ahora como tabla usando bucle for-->
    <div class="tabla">
    <table border="1">
        <tr>
            <th>Lista de Frutas</th>
        </tr>
        <?php foreach ($arrayFrutas as $fruta) : ?>
            <tr>
                <td><?php echo $fruta; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
    </div>
    <br><br>

    <!-- Ultimo como tabla sin usar bucles-->
    <div class="tabla">
    <table border="1">
    <tr>
        <th>Lista de Frutas</th>
    </tr>
    <tr>
    <td><?php echo implode("</td></tr><tr><td>", $arrayFrutas); ?></td>
    </tr>
    </table>
    </div>

</body>
</html>