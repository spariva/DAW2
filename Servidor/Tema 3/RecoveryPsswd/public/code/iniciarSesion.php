<?php
session_start();

$host = 'localhost';
$dbname = 'pruebapsswd';
$username = 'seguridad2';
$password = 'seguridad2';

$email = $_GET['email'];
$psswd = $_GET['psswd'];
$recuerdame = $_GET['recuerdame'];

        
//Generacion del token
$token = bin2hex(random_bytes(30));
$expires = 60*60*24*7;

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Utilizar consultas preparadas para evitar inyecciones SQL
    $sql = "SELECT NOMBRE, PSSWD FROM USER WHERE EMAIL = :email LIMIT 1";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);

    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($result && password_verify($psswd, $result['PSSWD'])) {
        // Si encontramos las coincidencias, guardar en sesión
        $_SESSION['nombreUsuario'] = $result['NOMBRE'];
        $_SESSION['emailUsuario'] = $email;

        if ($recuerdame == 'on') { 
            // AQUÍ ES DONDE GENERAMOS UN TOKEN QUE DURE UNA SEMANA QUE IRÁ CARGANDO LAS SESIONES DE USUARIO
            try {
                $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                //Primero borraremos todos los tokens que tenga creados ese usuario antes de asignarle uno nuevo
                $sql = 'DELETE FROM TOKENS WHERE USERID=:USERID';
                $stmt = $conn->prepare($sql);
                
                $stmt->bindParam(':USERID', $email, PDO::PARAM_STR);
                        
                $stmt->execute();
            
                // Utilizar consultas preparadas para evitar inyecciones SQL
                $sql = "INSERT INTO TOKENS (TOKEN, USERID, EXPIRES,TIPO) VALUES(:TOKEN, :USERID, :EXPIRES, 'AUTH')";
                $stmt = $conn->prepare($sql);

                // Asignar valores a los parámetros
                $stmt->bindParam(':TOKEN', $token, PDO::PARAM_STR);
                $stmt->bindParam(':USERID', $email, PDO::PARAM_STR);
                $stmt->bindParam(':EXPIRES', $expires, PDO::PARAM_STR);
        
                $stmt->execute();
            
            } catch (PDOException $pe) {
                die("No se pudo generar el token de usuario: " . $pe->getMessage());
            } finally {
                $conn = null; 
            }

            header("Location: cuenta.php?token=$token");//Volvemos pero enviando el token para guardarlo en cookies
            return;
        }

        //$nombreUsuario = $result['NOMBRE'];
        header("Location: cuenta.php?sesionIniciada=true");

    } else {
        echo "Por favor, inténtalo de nuevo.";
        header("Location: login.php?falloLogin=true");

    }

} catch (PDOException $pe) {
    die("No se pudo conectar a la base de datos $dbname: " . $pe->getMessage());
} finally {
    $conn = null; 
}
?>
