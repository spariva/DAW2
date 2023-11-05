<?php
require 'const.php';
session_start();

?>

<div class="menu">
    <a href="index.php">Inicio</a>
    <?php if (isset($_SESSION['usuario']) && $_SESSION['grupo'] == ADMIN) : ?>
        <a href="admin.php">Admin</a>
    <?php endif ?>
    <?php if (isset($_SESSION['usuario'])) : ?>
        <a href="privado.php">Privado</a>
    <?php endif ?>

    <?php if (isset($_SESSION['usuario'])) : ?>
        <a href="logout.php">Logout</a>
    <?php else : ?>
        <a href="login.php">Login</a>
    <?php endif; ?>
    <span><?= (isset($_SESSION['usuario'])) ? $_SESSION['usuario'] . " " . $_SESSION['nombreGrupo'] : "anonimo" ?></span>
</div>