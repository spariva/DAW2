<?php
session_start(); 

$host = 'localhost';
$dbname = 'pruebapsswd';
$username = 'seguridad2';
$password = 'seguridad2';

$nombre = $_SESSION['nombreUsuario'];
$email = $_SESSION['emailUsuario'];
$new_psswd = $_GET['new_psswd'];

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "UPDATE USER SET PSSWD = :new_psswd WHERE EMAIL = :email";
    $stmt = $conn->prepare($sql);

    //Tambien haremos psswd_hash
    $hashPsswd = password_hash($new_psswd, PASSWORD_DEFAULT);

    $stmt->bindParam(':new_psswd', $hashPsswd, PDO::PARAM_STR);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);

    $stmt->execute();

    // comprobar si funciono (mediante ver el mensaje que nos sale siempre en tyerminal etc)
    $rowCount = $stmt->rowCount();

    if ($rowCount > 0) {
        echo "Contraseña cambiada con éxito.";
        header("Location: cuenta.php?contrasenaCambiada=true");
        exit();
    } else {
        echo "No se encontró el usuario o la contraseña no se cambió.";
        header("Location: cuenta.php?contrasenaCambiada=true");
        exit();
    }

} catch (PDOException $pe) {
    die("No se pudo conectar a la base de datos $dbname: " . $pe->getMessage());
} finally {
    $conn = null; // Cerramoos
}