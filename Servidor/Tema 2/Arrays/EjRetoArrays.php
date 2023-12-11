<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
function aplastalo(mixed ...$arrays): array{
    return array_reduce($arrays, function ($resultado, $elemento) {
        //aquí hacía el forEach antes
        if (is_array($elemento)) {
            $elemento = aplastalo(...$elemento); // Llamada recursiva si el elemento es un array
        }
        return array_merge($resultado, (array)$elemento); // Combinar el elemento con el resultado, no sé por qué no me funciona con una variable fuera de la función anónima
    }, []);
}
$array1 = [1, 2, [3, 4]];
$array2 = [5, [6, [7]]];
$array3 = [[8], [9, 10]];

$resultado = aplastalo($array1, $array2, $array3);

print_r($resultado);
?>
</body>
</html>
