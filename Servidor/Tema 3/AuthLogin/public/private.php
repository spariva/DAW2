<?php
// FILEPATH: /Z:/programas/GitHub/DAW2/Servidor/Tema 3/AuthLogin/public/private.php

// Verificar si el usuario ha iniciado sesión, si no, redirigirlo a la página de inicio de sesión
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

// Obtener los datos del usuario desde la base de datos
// Aquí deberías tener tu lógica para obtener los datos del usuario, por ejemplo, desde una base de datos
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
    <h1>Bienvenido, <?= $_SESSION['username']; ?>!</h1>
    <p>Correo electrónico: <?php echo $userData['email']; ?></p>
    <p>Edad: <?php echo $userData['age']; ?></p>
    <!-- Otros detalles del perfil del usuario... -->
</body>
</html>
