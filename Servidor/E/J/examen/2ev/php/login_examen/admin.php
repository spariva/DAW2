<?php

require 'const.php';

session_start();

if (!isset($_SESSION['usuario']) || $_SESSION['grupo'] != ADMIN) {
    header('Location: login.php?url=admin.php');
    exit();
}

?>

<html>

<head>
    <link rel="stylesheet" type="text/css" media="all" href="css/estilo.css">
</head>

<body>
    <h1>Bienvenido!!</h1>
    <?php include('menu.php') ?>
    <p>Información solo para admin</p>
</body>

</html>