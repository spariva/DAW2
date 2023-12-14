<?php

//? Realiza una página que muestre el lista de cookies y permita establecer y borrar cookies con un tiempo en segundos de duración.

//? Form de crear cookie: nombre, valor, expira, ruta, dominio, secura (checkbox) y httponly (checkbox)

if (isset())
?>

<!DOCTYPE html>
<html>
<head>
    <title>Lista de Cookies</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            font-family: Arial, sans-serif;
        }
        .cookie-list {
            width: 400px;
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
    <div class="cookie-list">
        <h2>Lista de Cookies</h2>
        <!--Mostrar cada cookie en la lista-->
        <?php foreach ($_COOKIE as $cookie => $value) { ?>
            <div class="cookie-item">
            <span> <?php echo $cookie . ' : ' . $value ?> </span>
            <button>Editar</button>
            <button>Borrar</button>
            </div>
        <?php } ?>
        <button class="add-cookie-btn">Añadir Cookie</button>
    </div>
</body>
</html>
