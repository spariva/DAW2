<?php
$host = 'localhost';
$dbname = 'pruebapsswd';
$username = 'seguridad2';
$password = 'seguridad2';

//Vamos a no comprobar nada de datos de entrada contando con que todo esta genial
$email = $_GET['email'];
$psswd = $_GET['psswd'];
$nombre = $_GET['nombre'];

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Utilizar consultas preparadas para evitar inyecciones SQL
    $sql = "INSERT INTO USER (EMAIL, PSSWD, NOMBRE) VALUES (:email, :psswd, :nombre)";
    $stmt = $conn->prepare($sql);

    $hashPsswd = password_hash($psswd, PASSWORD_DEFAULT);

    // Asignar valores a los parámetros
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->bindParam(':psswd', $hashPsswd, PDO::PARAM_STR);
    $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);

    //Ejecucion (es dnd es mas probable el error)
    $stmt->execute();

    header("Location: login.php?cuentaCreada=true");
} catch (PDOException $pe) {
    die("No se pudo conectar a la base de datos $dbname: " . $pe->getMessage());
    header("Location: login.php?cuentaCreada=false");
} finally {
    $conn = null; // fin
}