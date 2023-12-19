<?php 
session_start(); // Iniciar o reanudar la sesión

$cuentaCreada = false;
if(isset($_SESSION['nombreUsuario'])){
    $cuentaCreada = true;
    $msj = '<h3>Bienvenidx '.$_SESSION['nombreUsuario'].'</h3>';
}else{
    header("Location: login.php");
    $cuentaCreada = false;
    $msj = '<h3>Problema al iniciar Sesion</h3>';
}

if(isset($_GET['token'])){
    setcookie('token', $_GET['token'], time() + (60 * 60 * 24 * 7), "/");
}

$contrasenaCambiada = false;
if(isset($_GET['contrasenaCambiada']) && $_GET['contrasenaCambiada']==true){
    $cuentaCreada = true;
    $msj = 'Contraseña actualizada';
}
if(isset($_GET['contrasenaCambiada']) && $_GET['contrasenaCambiada']==false){
    $cuentaCreada = false;
    $msj = 'Problema al actualizar la contraseña';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cuenta</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="../css/navbar.css">
  <link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
<header id="header">
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="d-flex align-items-center">
          <a class="textoCabecera" href="./index.php" id="logo">Parque de Atracciones </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
        </div>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item"><a class="nav-link" href="./cuenta.php">Cuenta</a></li>
            <li class="nav-item"><a class="nav-link" href="./verBD.php">ver BD</a></li>
          </ul>
        </div>
      </nav>
    </header>
    
    <div id="pagina">

        <div class="bloque">
        <?php
            if($contrasenaCambiada == true){
                echo '<div><p class="avisoCuenta" id="verde">'.$msj.'</p></div>';
            }else if($contrasenaCambiada == false){
                echo '<div><p class="avisoCuenta" id="rojo">'.$msj.'</p></div>';
            }

            echo '<p><a href="login.php?cerrarCuenta=true">Cerrar sesión en tu cuenta</a></p>';
            ?>
        </div>

        <div class="bloque">
            <h3>Datos de Usuario</h3>
            <br>
            <p>Nombre: <?= $_SESSION['nombreUsuario']?> </p>
            <br>
            <p>Correo: <?= $_SESSION['emailUsuario']?> </p>
        </div>

        <!--EN PROCESO 
        <div class="bloque">
            <form id="insertarLink" action="insertarLink.php" method="get">
                <p>Añadir cancion:</p>
                    <br>
                    <input name="link" type="text" required>
                    <br><br>
                    <button type="submit">Añadir</button><br><br>
            </form>
        </div>-->

        <div class="bloque">
            <form id="cambiarContrasena" action="cambiarContrasena.php" method="get">
                <p>Cambiar contraseña a una nueva:</p>
                    <br>
                    <input name="new_psswd" type="text" required>
                    <br><br>
                    <button type="submit">Enviar</button><br><br>
            </form>
        </div>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.10.2/umd/popper.min.js" defer></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
        crossorigin="anonymous"></script>
</body>
</html>