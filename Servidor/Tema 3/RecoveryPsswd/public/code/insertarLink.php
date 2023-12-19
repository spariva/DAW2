<?php
session_start(); 

//QUIERO QUE GUARDE LA RUTA DEL SRC EN LA BASE DE DATOS Y LUEGO EN CUENTA LO COJA Y MUESTRE EN UN IFRAME

$host = 'localhost';
$dbname = 'pruebapsswd';
$username = 'seguridad2';
$password = 'seguridad2';

$nombre = $_SESSION['nombreUsuario'];
$email = $_SESSION['emailUsuario'];
$link = $_GET['link'];

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "INSERT INTO USER (LINK) VALUES (:LINK)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':LINK', $link, PDO::PARAM_STR);

    $stmt->execute();

    // comprobar si funciono (mediante ver el mensaje que nos sale siempre en tyerminal etc)
    $rowCount = $stmt->rowCount();

    if ($rowCount > 0) {
        header("Location: cuenta.php?insertarLink=true");
    } else {
        header("Location: cuenta.php?insertarLink=true");
    }

} catch (PDOException $pe) {
    die("No se pudo completar el proceso: " . $pe->getMessage());
} finally {
    $conn = null; // Cerramoos
}