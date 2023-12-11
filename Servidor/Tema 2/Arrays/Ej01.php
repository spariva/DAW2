<?php    
    /*Ejercicio 1 
    For Loop: 
    a) Dado el array $frutas, utiliza un bucle for para imprimir cada fruta en una lista numerada. 
    b) Imprime la información en una tabla. 
    c) Imprime la información en una tabla sin usar bucles.

    array map documentation
    */   
    $frutas = ["Manzana", "Plátano", "Naranja", "Uva"];
    $precios = [1.2, 0.8, 1.0, 2.5];

    function agregarLista(...$params){
        for($i=1; $i<count($params);$i++){
            echo "<li>".$params[$i]."</li>";
        }
    }

    /*foreach($valores as $k => $valor){
        $resultado .= $valor;
        $resultado .= 
    }*/

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Lista de la Compra</h2>
    <ol>
    <?php 
    agregarLista($frutas);
    echo "<br>";
    ?>
    </ol>

    <br>
    <table>
        <tr>
        </tr>
    </table>
</body>
</html>