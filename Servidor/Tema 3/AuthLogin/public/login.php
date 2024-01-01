<?php
session_start();

if (isset($_SESSION['user'])) {
    header('Location: private.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $_SESSION['user'] = $username;
    echo $_SESSION['user'];
    // Aquí puedes realizar la validación de las credenciales del usuario
    // Por ejemplo, verificar si el usuario y la contraseña son correctos en una base de datos
    
    if ($username === 'admin' && $password === '1') {


        if (isset($_POST['remember'])) {
            // Establecer una cookie para recordar al usuario
            setcookie('rememberUser', $username, time() + 3600 * 24 * 7); // Cookie válida por 7 días
        }

        header('Location: private.php');
        exit();
    } else {
        $error = 'Credenciales inválidas';
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Iniciar sesión</title>
</head>
<body>
    <h1>Iniciar sesión</h1>

    <?php if (isset($error)) : ?>
        <p style="color:red"><?php echo $error; ?></p>
    <?php endif; ?>

    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="username">Usuario:</label>
        <input type="text" id="username" name="username" required><br>

        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password" required><br>

        <input type="checkbox" id="remember" name="remember">
        <label for="remember">Recordar usuario</label><br>

        <button type="submit">Iniciar sesión</button>
        
        </form>
</body>
</html>
