<?php
session_start();
// FILEPATH: /Z:/programas/GitHub/DAW2/Servidor/Tema 3/AuthLogin/public/private.php
echo $_SESSION['user'];
// Verificar si el usuario ha iniciado sesión, si no, redirigirlo a la página de inicio de sesión
if (!isset($_SESSION['user'])) {
    echo "No has iniciado sesión";
}

// Obtener los datos del usuario desde la base de datos
// Aquí deberías tener tu lógica para obtener los datos del usuario, por ejemplo, desde una base de datos
try {
    $db = new PDO('mysql:host=localhost;dbname=pruebaLogin','admin','1234');
    $consulta = $db->prepare("SELECT * FROM users WHERE name = :name ");
    $consulta->bindParam(":name", $name, PDO::PARAM_INT);
    $resultado = $consulta->execute();
    
    if($resultado){
        $receta = $consulta->fetch();
    } else{
        $receta = null;
    }

}catch(PDOException $e){
    echo "ERROR:" . $e->getMessage();
    die();
}

$userData = [
    'name' => 'John Doe',
    'email' => 'johndoe@example.com',
    'age' => 30,
    // Otros datos del usuario...
];

// Mostrar la página de perfil del usuario
?>
<!DOCTYPE html>
<html>
<head>
    <title>Perfil de Usuario</title>
</head>
<body>
    <h1>Bienvenido, <?= $_SESSION['user']; ?>!</h1>
    <p>Correo electrónico: <?php echo $userData['email']; ?></p>
    <p>Edad: <?php echo $userData['age']; ?></p>
    <!-- Otros detalles del perfil del usuario... -->
</body>
</html>
