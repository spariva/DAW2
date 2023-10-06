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
        if (is_array($elemento)) {
            $elemento = aplastalo(...$elemento); // Llamada recursiva si el elemento es un array
        }
        return array_merge($resultado, (array)$elemento); // Combinar el elemento con el resultado
    }, []);
}

// Ejemplo de uso:
$array1 = [1, 2, [3, 4]];
$array2 = [5, [6, [7]]];
$array3 = [[8], [9, 10]];

$resultado = aplastalo($array1, $array2, $array3);

print_r($resultado);
?>
</body>
</html>
/*Vamos a desglosar cómo funciona esta llamada a array_reduce():

$args es un arreglo que contiene todos los argumentos pasados a la función aplastalo(). En este caso, $args puede contener un número variable de argumentos, cada uno de los cuales puede ser un array con posibles anidaciones.

La función array_reduce() acepta dos argumentos:
    El primer argumento es el arreglo que estamos reduciendo, en este caso, $args.
    El segundo argumento es una función de reducción, que se ejecuta para cada elemento del arreglo y se encarga de combinar esos elementos en un solo valor.

La función de reducción se define como una función anónima (lambda function) que toma dos parámetros: $result y $item. Estos parámetros tienen los siguientes roles:
    $result: Representa el resultado acumulado hasta el momento. En nuestro caso, este será un array que estamos construyendo gradualmente.
    $item: Representa el elemento actual del arreglo que estamos procesando. Puede ser un elemento simple o un array anidado.

Dentro de la función de reducción, estamos realizando lo siguiente:

Comprobamos si $item es un array utilizando is_array($item). Si es un array, significa que tenemos que procesar sus elementos internos, por lo que llamamos recursivamente a la función aplastalo(...$item).

Luego, utilizamos array_merge($result, (array)$item) para combinar el elemento actual ($item) con el resultado acumulado ($result). Usamos (array)$item para asegurarnos de que $item sea tratado como un array, incluso si es un valor escalar.

El resultado combinado se convierte en el nuevo valor de $result.

El ciclo continúa con el siguiente elemento del arreglo hasta que se procesen todos los elementos.

Al final, array_reduce() devuelve un único valor que es el resultado de combinar todos los elementos del arreglo original en un solo array. Este proceso se repite de forma recursiva si hay arrays anidados, lo que nos permite aplastar todos los niveles de anidación y obtener un solo arreglo plano como resultado.
*/

