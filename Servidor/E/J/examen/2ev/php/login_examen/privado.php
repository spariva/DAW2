<?php

session_start();

if (!isset($_SESSION['usuario'])) {
    header('Location: login.php?url=privado.php');
}

?>

<html>

<head>
    <link rel="stylesheet" type="text/css" media="all" href="css/estilo.css">
</head>

<body>
    <h1>Bienvenido!!</h1>
    <?php include('menu.php') ?>
    <p>Información solo para gente autentificada</p>
</body>

</html>