<?php

require('../src/init.php');

if(isset($_SESSION['usuario'])) {
    
    unset($_SESSION['usuario']);
    unset($_SESSION['id']);

    if (isset($_COOKIE['recuerdame'])) {
        $DB->ejecuta("DELETE FROM token WHERE valor = ?", $_COOKIE['recuerdame']);
        setcookie("recuerdame", null, [
            "expires" => time() - 3600,
            // "secure" => true,
            "httponly" => true
        ]);
    }
}

header('Location: listado.php');