<?php
    // autoload
    spl_autoload_register(function ($class) {
        $path = "./";
        $file = str_replace("\\", "/", $class);
        require("$path{$file}.php");
    });

    $form = new Config\Form();
    // crea todos los inputs y se guardan automaticamente en un array con la clave :<<nombre>> para introducirlo a la base de datos
    @$form->crearInputs($_POST);
    // print_r($_POST);

    if(isset($_POST["submit"])) {
        // se validan todos los campos de forma individual y se guarda en una variable la cantidad de errores que hay
        $form->validarForm();

        // vemos si el formulario es valido
        if($form->esValido()) {
            // echo "es valido";
            // gracias al array de inputs recogemos los datos
            $form->guardarBBDD();

            header("Location: index.php?success");
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <div class="main">
        <h3>Registro</h3>
        <?= $form->crearForm("", "POST") ?>
        <a href="./listado.php">Listado</a>
    </div>
</body>
</html>