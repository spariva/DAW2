<?php
    // autoload
    spl_autoload_register(function ($class) {
        $path = "./";
        $file = str_replace("\\", "/", $class);
        require("$path${file}.php");
    });

    $form = new Config\Form();
    
    @$form->crearInputs($_POST);
    // print_r($_POST);

    if(isset($_POST["submit"])) {
        // se validan todos los campos de forma individual y se guarda en una variable la cantidad de errores que hay
        $form->validarForm();

        // vemos si el formulario es valido
        if($form->esValido()) {

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
    <style>
        .error {
            color: red;
        }

        .success {
            color: green;
        }
    </style>
</head>
<body>
    <div class="main">
        <h3>Pedir Queso</h3>
        <?= $form->crearForm("index.php", "POST") ?>
    </div>
</body>
</html>