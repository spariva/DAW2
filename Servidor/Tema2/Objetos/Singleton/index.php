<?php
include 'Config.php';

$config = Config::singleton();
$config->setNombre("myConfig");
echo $config->getNombre();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flex-wrap</title>
    <link rel="stylesheet" href="styles.css"/>
</head>
<body>
    <h1><?= $config->getNombre()?></h1>
</body>
</html>