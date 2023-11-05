<?php
$array = [
    "Nombre" => "Jason",
    "Edad" => 19,
    "Email" => "jason.londono@educa.madrid.org",
    "Cumpleaños" => "28/05/2003"
];

function pintaHorizontal($array)
{
?>
    <table>
        <tr>
            <?php foreach (array_keys($array) as $key) : ?>
                <th><?= $key ?></th>
            <?php endforeach; ?>
        </tr>
        <tr>
            <?php foreach ($array as $celda) : ?>
                <td><?= $celda ?></td>
            <?php endforeach; ?>
        </tr>
    </table>
<?php
}

function pintaVertical($array)
{
?>
    <table>
        <?php foreach ($array as $key => $value) : ?>
            <tr>
                <th><?= $key ?></th>
                <td><?= $value ?></td>
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
    <title>Pintan HTML</title>
    <style>
        table {
            border-collapse: collapse;
        }

        td,
        th {
            border: 1px solid black;
        }
    </style>
</head>

<body>
    <?= pintaHorizontal($array) ?>
    <br>
    <?= pintaVertical($array) ?>
</body>

</html>