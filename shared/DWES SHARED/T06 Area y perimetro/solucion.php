<?php
    $radio= $_POST['radio'];
    $pi=3.141;
    $area= 2*$pi*$radio;
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Area y Perimetro</title>
    </head>
    <body>
        el area es: <?$area ?>
        <form action="solucion.php" method="post">
            <label for="radio">Introduce el valor del Radio</label>
            <input type="text" name="radio" id="radio">
            <input type="submit" value="cargar" id="cargar">


        </form>
    </body>

</html>