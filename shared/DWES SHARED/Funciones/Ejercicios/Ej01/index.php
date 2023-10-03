<?php
function agregarLista(...$params){
    for($i=1; $i<count($params);$i++){
        echo "<".$params[0].">".$params[$i]."</".$params[0].">";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ej01</title>
</head>
<body>
    <h2>Lista de la Compra</h2>
    <ul>
    <li>Zanahoria</li>
    <li>Pepinos</li>

    <?php 
    agregarLista('li', "Cebollas", "Caramelod","Pan");
    ?>
    </ul>
</body>
</html>
