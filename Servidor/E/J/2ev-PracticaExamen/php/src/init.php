<?php

// iniciamos la sesión
session_start();

// definimos diferenetes constantes
define("DAYS_RENEW", 7);
define("TIME_TOKEN_PASSWD", 20);
define("LONG_TOKEN", 32);
define('TOKEN_SESSION', 1);
define('TOKEN_RECOVER_PASSWD', 2);
define('TOKEN_VERIFY', 3);

// requerimos de los controladores de la base de datos y del mailer
require('DWESBaseDatos.php');
require('Mailer.php');

// requer
require '../vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/phpmailer/phpmailer/src/Exception.php';
require '../vendor/phpmailer/phpmailer/src/PHPMailer.php';
require '../vendor/phpmailer/phpmailer/src/SMTP.php';

$TITLE = "Linkenin";
$DB = DWESBaseDatos::obtenerInstancia();
$DB->inicializa(
    $_ENV['DB_NAME'],
    $_ENV['DB_USER'],
    $_ENV['DB_PASS']
);

// print_r($_COOKIE);
// print_r($_SESSION);
// print_r($_FILES);

if (!isset($_SESSION['usuario']) && isset($_COOKIE['recuerdame']) && $_COOKIE['recuerdame'] != null) {
    // hacer join
    $DB->ejecuta(
        "SELECT t.id as 'id_token', u.id as 'id_usuario', u.nombre 
        FROM token t 
        LEFT JOIN usuarios u ON u.id = t.id_usuario 
        WHERE t.valor = ? AND t.expiracion > NOW()",
        $_COOKIE['recuerdame']
    );

    $token = $DB->obtenPrimeraInstancia();

    // print_r($token);

    if (!empty($token)) {
        $DB->ejecuta(
            "UPDATE token 
            set expiracion = (NOW() + INTERVAL ? DAY) 
            WHERE id = ?",
            DAYS_RENEW,
            $token['id_token']
        );

        $_SESSION['usuario'] = $token['nombre'];
        $_SESSION['id'] = $token['id_usuario'];
    }
}

function getToken()
{
    return bin2hex(openssl_random_pseudo_bytes(LONG_TOKEN));
}

function br2nl($input)
{
    return preg_replace('/<br\s?\/?>/ius', "\n", str_replace("\n", "", str_replace("\r", "", htmlspecialchars_decode($input))));
}

function recuperarToken($token, $tipo)
{
    $DB = DWESBaseDatos::obtenerInstancia();

    $DB->ejecuta("SELECT * FROM token WHERE valor = ? AND tipo = ? AND expiracion > NOW()", $token, $tipo);

    $token = $DB->obtenPrimeraInstancia();

    // print_r($token);
    // echo ($DB->obtenPrimeraInstancia())?'Correcto':'Error expirado';
    // print_r($DB->obtenPrimeraInstancia());

    return $token;
}

// mirar template and use of ob_start()