<?php
    $frutas = ["Platano", "Naranja", "Pomelo", "Manzana"];
    $precios = [1, 4, 10, 9];

    function lista(array $info): string
    {
        $html = array_reduce($info, function ($anterior, $actual) {
            return $anterior . "<li>$actual</li>";
        }, "<ol>");
        $html .= "</ol>";
        return $html;
    }

    echo lista($frutas);
    echo lista($precios);

    print_r(array_map(null, $frutas, $precios));

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reduce</title>
</head>
<body>

</body>
</html>