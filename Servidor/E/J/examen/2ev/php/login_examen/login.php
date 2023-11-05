<?php

session_start();

require 'DWESBaseDatos.php';

$db = DWESBaseDatos::obtenerInstancia();

$db->inicializa("examen", "examen", "examen");

$error;
$url = '';
if (isset($_GET['url'])) {
    $url = $_GET['url'];
} elseif (isset($_POST['url'])) {
    $url = $_POST['url'];
}

// print_r($_POST);

if (isset($_POST['submit'])) {
    $login = $_POST['login'];
    $password = $_POST['password'];

    if (empty($login) || empty($password)) {
        $error = "Los campos son obligatorios";
    } else {
        $db->ejecuta("SELECT u.nombre, u.secreto, u.id_grupo, g.nombre as 'nombre_grupo' from usuarios u LEFT JOIN grupos g on u.id_grupo = g.id where u.nombre = ?", $login);

        $usuario = $db->obtenPrimeraInstancia();

        if (!empty($usuario) && password_verify($password, $usuario['secreto'])) {
            $_SESSION['usuario'] = $usuario['nombre'];
            $_SESSION['grupo'] = $usuario['id_grupo'];
            $_SESSION['nombreGrupo'] = $usuario['nombre_grupo'];

            header("Location: " . (!empty($url) ? $url : "index.php"));
        } else {
            $error = "Usuario o contraseña incorrecto";
        }
    }
}

?>

<html>

<head>
    <link rel="stylesheet" type="text/css" media="all" href="css/estilo.css">
</head>

<body>
    <h1>Bienvenido!!</h1>
    <?php include('menu.php') ?>
    <form action="login.php" method="post" class="login">
        <p>
            <label for="login">Email:</label>
            <input type="text" name="login" id="login" value="<?= $login ?>">
        </p>

        <p>
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" value="">
        </p>

        <input type="hidden" name="url" value="<?= $url ?>">


        <?php if (!empty($error)) : ?>
            <p class="error"><?= $error ?></p>
        <?php endif ?>

        <p class="login-submit">
            <label for="submit">&nbsp;</label>
            <button type="submit" name="submit" class="login-button">Login</button>
        </p>
    </form>
</body>

</html>