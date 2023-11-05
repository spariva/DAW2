<?php

require('../src/init.php');

if (isset($_SESSION['usuario'])) {
    header('Location: listado.php');
}

$insertado = false;

$correo = '';
$nombre = '';
$passwd = '';

if (isset($_POST['submit'])) {
    $correo = $_POST['correo'];
    $nombre = $_POST['nombre'];
    $passwd = $_POST['passwd'];

    $DB->ejecuta("INSERT INTO usuarios (nombre, passwd, correo) values (?, ?, ?)", $nombre, password_hash($passwd, PASSWORD_DEFAULT), $correo);

    $insertado = $DB->getExecuted();

    if ($insertado) {
        $DB->ejecuta("SELECT * FROM usuarios WHERE correo = ?", $correo);
        $usuario = $DB->obtenPrimeraInstancia();

        $token = getToken();

        $DB->ejecuta("INSERT INTO token (id_usuario, valor, tipo) VALUES (?, ?, ?)", $usuario['id'], $token, TOKEN_VERIFY);

        Mailer::enviarRegistro($correo, $nombre, $token);

        header('Location: registro.php?success');
    }
}

// css
ob_start();
?>
<!-- etiquetas css -->
<?php
$css = ob_get_clean();

// scripts
ob_start();
?>
<!-- etiquetas script att defer -->
<?php
$scripts = ob_get_clean();

// avisos
ob_start();
?>
<!-- avisos -->
<?php
$avisos = ob_get_clean();

// titulo
$tituloPagina = "";

// contenido
ob_start();
?>
<form class="formulario container-lg d-flex flex-column mx-auto" method="POST" action="">
    <h2 class="mb-3">Registro</h2>

    <div class="form-floating mb-3">
        <input class="form-control" type="email" name="correo" id="correo" value="<?= $correo ?>" placeholder="" autofocus>
        <label for="passwd">Email:</label>
    </div>

    <div class="form-floating mb-3">
        <input class="form-control" type="text" name="nombre" id="nombre" value="<?= $nombre ?>" placeholder="">
        <label for="nombre">Nombre:</label>
    </div>

    <div class="form-floating mb-3">
        <input class="form-control" type="password" name="passwd" id="passwd" value="<?= $passwd ?>" placeholder="">
        <label for="passwd">Constraseña:</label>
    </div>

    <input class="btn btn-primary mb-3" type="submit" name="submit" value="Log in">

    <?php if (isset($_GET['success'])) : ?>
        <div class="alert alert-success" role="alert">
            Se ha registrado correctamente
        </div>
    <?php endif; ?>

</form>
<?php
$contenido = ob_get_clean();

// implementamos la plantilla en la que se aplican las variables antes incializadas
require '../src/template.php';
?>