<?php

include('../config/init.php');
//en el init pongo la gestión de los requires por no ponerla aquí
$b = new Bici(2);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p><?= $b ?></p>
</body>
</html>