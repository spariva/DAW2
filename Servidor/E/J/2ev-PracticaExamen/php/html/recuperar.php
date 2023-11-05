<?php

require('../src/init.php');

if (isset($_SESSION['usuario'])) {
    header('Location: listado.php');
}

$recuperar = false;
if (isset($_GET['t'])) {
    $recuperar = true;

    $token = recuperarToken($_GET['t'], TOKEN_RECOVER_PASSWD);

    if (isset($_POST['new_passwd']) && !empty($token)) {
        $DB->ejecuta("UPDATE usuarios SET passwd = ? WHERE id = ?", password_hash($_POST['passwd'], PASSWORD_DEFAULT), $token['id_usuario']);

        $DB->ejecuta("DELETE FROM token WHERE id = ?", $token['id']);

        header('Location: listado.php');
        exit();
        
    } elseif (empty($token)) {
        
        header('Location: recuperar.php?error=recover');
        exit();
    }

}

if (isset($_POST['enviar'])) {

    $DB->ejecuta("SELECT * FROM usuarios WHERE correo = ?", $_POST['correo']);

    $usuario = $DB->obtenPrimeraInstancia();

    if (!empty($usuario)) {
        $token = getToken();

        $DB->ejecuta("INSERT INTO token (id_usuario, valor, tipo, expiracion) VALUES (?, ?, ?, NOW() + INTERVAL ? MINUTE)", $usuario['id'], $token, TOKEN_RECOVER_PASSWD, TIME_TOKEN_PASSWD);

        Mailer::enviarRecuperar($usuario['correo'], $usuario['nombre'], $token);

        header('Location: recuperar.php?enviado');
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
<form action="" method="POST" class="formulario container-lg d-flex flex-column mx-auto">
    <h2 class="mb-3">Recuperar contraseña</h2>

    <?php if (!$recuperar) : ?>

        <div class="form-floating mb-3">
            <input type="text" name="correo" id="correo" class="form-control" placeholder="" required>
            <label for="correo">Correo:</label>
            <div class="form-text">Correo al que se le enviará los pasos a seguir para cambiar la contraseña</div>
        </div>

        <input type="submit" value="Enviar" name="enviar" class="btn btn-primary mb-3">

    <?php else : ?>

        <div class="form-floating mb-3">
            <input type="password" name="passwd" id="passwd" class="form-control" placeholder="" required>
            <label for="correo">Contraseña:</label>
            <div class="form-text">Contraseña nueva</div>
        </div>

        <input type="submit" value="Enviar" name="new_passwd" class="btn btn-primary mb-3">

    <?php endif; ?>

    <?php if (isset($_GET['enviado'])) : ?>
        <div class="alert alert-success" role="alert">
            Se ha enviado correctamente el correo
        </div>
    <?php endif; ?>
    <?php if (isset($_GET['error']) && $_GET['error'] == 'recover') : ?>
        <div class="alert alert-danger" role="alert">
            Ha expirado el tiempo para poder reestablecer su contraseña o ya ha cambiado la contraseña, pruebe de nuevo.
        </div>
    <?php endif; ?>
    
</form>
<?php
$contenido = ob_get_clean();

// implementamos la plantilla en la que se aplican las variables antes incializadas
require '../src/template.php';
?>