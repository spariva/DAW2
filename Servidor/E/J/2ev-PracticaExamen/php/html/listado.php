<?php

require('../src/init.php');

$DB->ejecuta("SELECT * FROM usuarios");

$usuarios = $DB->obtenDatos();

$verificado = 1;
if (isset($_SESSION['usuario'])) {
    $DB->ejecuta("SELECT * FROM usuarios WHERE id = ?", $_SESSION['id']);

    $usuario = $DB->obtenPrimeraInstancia();

    $verificado = $usuario['verificacion'];
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
<?php if (isset($_SESSION['usuario']) && !$verificado) : ?>
    <div class="alert alert-warning" role="alert">
        Por favor verifique su cuenta, se le ha enviado un correo. <a href="verificar.php?reenviar" rel="noopener noreferrer">Reenviar correo</a>
    </div>
<?php endif; ?>

<?php if (isset($_GET['error']) && $_GET['error'] == 'verify') : ?>
    <div class="alert alert-danger" role="alert">
        No se ha podido verificar su cuenta de correo.
    </div>
<?php endif; ?>
<?php
$avisos = ob_get_clean();

// titulo
$tituloPagina = "Listado";

// contenido
ob_start();
?>
<div class="listado">
    <?php foreach($usuarios as $usuario): ?>
    <div class="tarjeta rounded shadow mb-4">
        <div class="tarjeta__header">
            <img src="<?= $usuario['img'] ?>" alt="" class="tarjeta__foto" draggable="false">
            <span class="tarjeta__usuario"><?= $usuario['nombre'] ?></span>
        </div>
        <p class="tarjeta__desc"><?= $usuario['descripcion'] ?></p>
    </div>
    <?php endforeach; ?>
</div>
<?php
$contenido = ob_get_clean();

// implementamos la plantilla en la que se aplican las variables antes incializadas
require '../src/template.php';
?>