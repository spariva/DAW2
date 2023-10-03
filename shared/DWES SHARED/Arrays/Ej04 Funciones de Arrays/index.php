<?php
$arrayFrutas = array("Platano", "Naranja", "Pomelo", "Manzana");
$arrayPrecios = array(3.2, 2.1, 5.4, 2.0);
$arrayCantidad = array(5, 4, 3, 5);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="tabla">
        <table border="1">
            <tr>
                <th>Lista de Frutas</th>
                <th>Precio/U</th>
                <th>Cantidad/U</th>
                <th>Total/U</th>
            </tr>

            <?php for ($i = 0; $i < count($arrayFrutas); $i++) : ?>
                <tr>
                    <?php
                    $total = $arrayPrecios[$i] * $arrayCantidad[$i];
                    ?>
                    <th><?php echo $arrayFrutas[$i]; ?></th>
                    <th><?php echo $arrayPrecios[$i]; ?></th>
                    <th><?php echo $arrayCantidad[$i]; ?>eur</th>
                    <th><?php echo $total; ?></th>
                </tr>
            <?php endfor; ?>
        </table>
    </div>
    <br><br>

</body>

</html>