<?php
function agregarLista($max){
    for($i=1; $i<=$max;$i++){
        echo "<img src=".'"'.$i.'.'."jpg".'"'."/>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel="stylesheet">
    <title>Ej01</title>
</head>
<body>
    <p><h2>Galería de imágenes</h2></p>
    <br>
    <?php 
    agregarLista(4);
    ?>
</body>
</html>
