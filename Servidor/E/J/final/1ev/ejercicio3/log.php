<?php

// para que la hora salga formateada como la de madrid
date_default_timezone_set("Europe/Madrid");

$options = [
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
];

try {
    $conn = new PDO("mysql:host=localhost;dbname=examen", "examen", "examen", $options);
} catch (PDOException $e) {
    echo $e;
}

function crearTabla($conn)
{
    $stmt = $conn->query("SELECT navegador, timestamp FROM Logs");

    $stmt->execute();

    $log = $stmt->fetchAll();
?>
    <table>
        <tr>
            <?php foreach ($log[0] as $key => $celda) : ?>
                <th><?= ucfirst($key) ?></th>
            <?php endforeach; ?>
        </tr>

        <?php foreach ($log as $fila) : ?>
            <tr>
                <?php foreach ($fila as $key => $celda) : ?>
                    <?php if ($key == "timestamp") : ?>
                        <td><?= date("d-m-Y H:i:s", $celda); ?></td>
                    <?php else : ?>
                        <td><?= $celda ?></td>
                    <?php endif; ?>
                <?php endforeach; ?>
            </tr>
        <?php endforeach; ?>
    </table>
<?php
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log</title>
    <style>
        table {
            border-collapse: collapse;
        }

        td, th {
            border: 1px solid black;
        }
    </style>
</head>

<body>
    <?= crearTabla($conn) ?>
</body>

</html>