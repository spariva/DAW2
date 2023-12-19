<?php
session_start(); // Sirve tmbn para reanudar la sesión

if((isset($_GET['cerrarCuenta'])) &&  ($_GET['cerrarCuenta']==true)){
    session_destroy();
}

/*$iniciadaSesion = false;
if (isset($_COOKIE['inicioSesion']) && $_COOKIE['inicioSesion'] == true) {
     $iniciadaSesion = true;
     setcookie('inicioSesion', true, time() + (60 * 60 * 24 * 7), "/");
     // la sesion se alarga una semana cada vez
 }else {
   if(isset($_GET['inicioSesion']) && ($_GET['inicioSesion']) == true){
    $iniciadaSesion = true;
     setcookie('inicioSesion', true, time() + (60 * 60 * 24 * 7), "/");
    }else{
     setcookie('inicioSesion', false);
    $iniciadaSesion = false;
  }
 }*/

if (isset($_SESSION['nombreUsuario']) && $_SESSION['nombreUsuario'] != "") {
    header("Location: cuenta.php?sesionIniciada=true");
    exit();
}

 $cuentaCreada = false;
if(isset($_GET['cuentaCreada']) && $_GET['cuentaCreada']==true){
    $cuentaCreada = true;
    $msj = 'cuenta creada correctamente';
}
if(isset($_GET['cuentaCreada']) && $_GET['cuentaCreada']==false){
    $cuentaCreada = false;
    $msj = 'problema al crear la cuenta';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log-in</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../css/navbar.css">
    <link rel="stylesheet" type="text/css" href="../css/login.css">
    <link </head>

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

    <?php
    if($cuentaCreada == true){
        echo '<div><p class="avisoCuenta" id="verde">'.$msj.'</p></div>';
    }else if($cuentaCreada == false){
        echo '<div><p class="avisoCuenta" id="rojo">'.$msj.'</p></div>';
    }
    ?>

    <?php
    if(isset($_SESSION['nombreUsuario'])){
        echo '<p class="avisoCuenta"><a href="cuenta.php">Hola '.$_SESSION['nombreUsuario'].', ve a tu perfil</a></p>';
    }
    ?>

    <?php
    if(isset($_GET['falloLogin'])){
        echo '<p class="avisoCuenta" id="rojo">Fallo al iniciar sesión. Datos incorrectos</a></p>';
    }
    ?>

    <div id="pagina">
    <?php if (isset($_COOKIE['inicioSesion']) && $_COOKIE['inicioSesion'] == true) {
        echo '<h2> Sesion iniciada</h2>';
    }else{?>
        <div class="bloque">
            <form id="iniciarSesion" action="iniciarSesion.php" method="get" style="display: block;">
                <h3>Inicia Sesión</h3>
                <br><br>
                <p>Email de usuario</p>
                <input name="email" type="email" required>
                <br><br>
                <p>Contraseña</p>
                <input name="psswd" type="password" required>
                <br><br>
                <p> <input name="recuerdame" type="checkbox"> Recuérdame</p>
                <br><br>
                <button type="submit">Enviar</button>
                <br><br>
                <button href="" id="iniciarSesionBoton">No tengo cuenta</button>
            </form>

            <form id="crearCuenta" action="crearUsuario.php" method="get" style="display: none;">
                <h3>Crea una Cuenta</h3>
                <br><br>
                <p>Nombre de Usuario</p>
                <input name="nombre" type="text" required>
                <br><br>
                <p>Email de usuario</p>
                <input name="email" type="email" required>
                <br><br>
                <p>Contraseña</p>
                <input name="psswd" type="password" required minlength="6" title="Mínimo 6 caracteres">
                <br><br>
                <button type="submit">Enviar</button><br><br>
                <button href="" id="crearCuentaBoton">¿Ya tienes una cuenta?</button><br><br>
            </form>
        </div>
        <?php } ?>
    </div>
    <script>
            const crearCuentaBoton = document.getElementById('crearCuentaBoton');
            const iniciarSesionBoton = document.getElementById('iniciarSesionBoton');
            const crearCuenta = document.getElementById('crearCuenta');
            const iniciarSesion = document.getElementById('iniciarSesion');

            crearCuentaBoton.onclick = function () {
                iniciarSesion.style.display = 'block';
                crearCuenta.style.display = 'none';
            }

            iniciarSesionBoton.onclick = function () {
                crearCuenta.style.display = 'block';
                iniciarSesion.style.display = 'none';
            }
    </script>


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