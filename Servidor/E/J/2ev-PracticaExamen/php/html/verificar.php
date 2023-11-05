<?php

require '../src/init.php';

if (isset($_GET['t'])) {
    
    $token = recuperarToken($_GET['t'], TOKEN_VERIFY);

    if (!empty($token)) {
        $DB->ejecuta("UPDATE usuarios SET verificacion = 1 WHERE id = ?", $token['id_usuario']);
        
        $DB->ejecuta("DELETE FROM token WHERE id = ?", $token['id']);

        header('Location: listado.php');
        exit();
    } else {

        header('Location: listado.php?error=verify');
        exit();
    }
    
} elseif (isset($_GET['reenviar']) && isset($_SESSION['usuario'])) {
    $DB->ejecuta("SELECT * FROM usuarios WHERE id = ?", $_SESSION['id']);

    $token = getToken();

    $usuario = $DB->obtenPrimeraInstancia();

    $DB->ejecuta("INSERT INTO token (id_usuario, valor, tipo) VALUES (?, ?, ?)", $usuario['id'], $token, TOKEN_VERIFY);

    Mailer::enviarRegistro($usuario['correo'], $usuario['nombre'], $token);
}

header('Location: listado.php');
exit();