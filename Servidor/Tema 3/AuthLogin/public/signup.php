<?php
// FILEPATH: /z:/programas/GitHub/DAW2/Servidor/Tema 3/AuthLogin/public/signup.php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Procesar los datos del formulario de registro aquí
    // ...
    // Redirigir al usuario a otra página después del registro exitoso
    header('Location: registro_exitoso.php');
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Registro</title>
</head>
<body>
    <h1>Registro</h1>
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <!-- Agrega aquí los campos del formulario de registro -->
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required><br><br>
        
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>
        
        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password" required><br><br>
        
        <input type="submit" value="Registrarse">
    </form>
</body>
</html>
