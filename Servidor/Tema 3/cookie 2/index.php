<?php

//? Realiza una página que muestre el lista de cookies y permita establecer y borrar cookies con un tiempo en segundos de duración.

//? Form de crear cookie: nombre, valor, expira, ruta, dominio, secura (checkbox) y httponly (checkbox)
setcookie('privacy', '1', time() + (60*60*24*7));
setcookie('prueba', 'hola', time() + (60*60*24*7));

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['crearCookie'])) {
        $nombre = $_POST['nombre'];
        $valor = $_POST['valor'];
        $expira = $_POST['expira'];
        $ruta = $_POST['ruta'];
        $dominio = $_POST['dominio'];
        $segura = $_POST['segura'];
        $httponly = $_POST['httponly'];
        setcookie($nombre, $valor, time() + $expira, $ruta, $dominio, $segura, $httponly);
        header('Location: index.php');
        exit();
    }
    if (isset($_POST['eliminarCookie'])) {
        $id = $_POST['eliminarCookie'];
        setcookie($id, '', time() - 1);
        header('Location: index.php');
        exit();
    }
    if (isset($_POST['editarCookie'])) {
        $id = $_POST['editarCookie'];
        $nombre = $_POST['nombre'];
        $valor = $_POST['valor'];
        $expira = $_POST['expira'];
        $ruta = $_POST['ruta'];
        $dominio = $_POST['dominio'];
        $segura = $_POST['segura'];
        $httponly = $_POST['httponly'];
        setcookie($id, $valor, time() + $expira, $ruta, $dominio, $segura, $httponly);
        header('Location: index.php');
        exit();
    }
}


?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=devicewidth, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Lista de Cookies</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            width: 90%;
            font-family: Arial, sans-serif;
        }
        .cookie-list {
            width: 60%;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: burlywood;
            flex: 1;
        }
        .cookie-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
        }
        .cookie-item button {
            margin-left: 10px;
        }
        .add-cookie-btn {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <img class="mx-5 p-3" src="https://media.gettyimages.com/id/458254583/es/foto/monstruo-de-las-galletas-pl%C3%A1stico-juguete-barrio-s%C3%A9samo.jpg?s=612x612&w=0&k=20&c=lPO8dCZ94woX2QwYpKtSSX9MpDtN5Ldsp3RTTrJnpqA=" alt="logo" width="200px">
    <div class="cookie-list">
        <h2>Lista de Cookies</h2>
        <!--Mostrar cada cookie en la lista-->
        <?php foreach ($_COOKIE as $cookie => $value) { ?>
            <div class="cookie-item">
                <span> <?php echo $cookie . ' : ' . $value ?> </span>
                <form method="post" action="" id="form-cookie-<?= $cookie ?>">
                    <input type="hidden" name="eliminarCookie" value="<?= $value['id'] ?>">
                    <button class="btn btn-warning" data-nombre="<?= $value['nombre'] ?>" data-form-id="form-cookie-<?= $cookie ?>">Borrar</button>
                    <input type="hidden" name="editarCookie" value="<?= $value['id'] ?>">
                    <button class="btn btn-primary text-white" data-nombre="<?= $value['nombre'] ?>" data-form-id="form-cookie-<?= $cookie ?>">Editar</button>
                </form>
            </div>
        <?php } ?>
        <!--Formulario para crear una cookie-->
        <form method="post" action="">
            <h3>Crear Cookie</h3>
            <div>
                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre" id="nombre" required>
            </div>
            <div>
                <label for="valor">Valor:</label>
                <input type="text" name="valor" id="valor" required>
            </div>
            <div>
                <label for="expira">Expira (segundos):</label>
                <input type="number" name="expira" id="expira" required>
            </div>
            <div>
                <label for="ruta">Ruta:</label>
                <input type="text" name="ruta" id="ruta">
            </div>
            <div>
                <label for="dominio">Dominio:</label>
                <input type="text" name="dominio" id="dominio">
            </div>
            <div>
                <label for="segura">Segura:</label>
                <input type="checkbox" name="segura" id="segura">
            </div>
            <div>
                <label for="httponly">HttpOnly:</label>
                <input type="checkbox" name="httponly" id="httponly">
            </div>
            <div>
                <button type="submit" name="crearCookie">Crear</button>
            </div>
        </form>
        <button class="add-cookie-btn">Añadir Cookie</button>
    </div>
</body>
</html>
