<?php

//Imprimimos por pantalla los datos para ver si se estan recogiendo
echo "<pre>";
print_r($_POST);
echo "</pre>";

//variables constantes que usaremos
define('MIN_DESCRIPCION', 10);
define('FILE_DATA','data.csv');

$msg ="";
if(isset($_POST['msg'])){
    $msg = $_POST['msg'];
}

$titulo = "";
$descripcion = "";
$fecha = "";
$permanente = "";
$nombre = "";
$errores = [];

//verifica si entre la informacion enviada se encuentra 'enviar', que se trata del nombre
//del boton submit, asi que si esta presente es porque el formulario se ha enviado correctamente
if (isset($_POST['enviar'])) {
    if (isset($_POST['titulo']) && $_POST['titulo'] != "") {
        //si existe 'titulo' se guarda en $titulo
        $titulo = $_POST['titulo'];
    } else {
        //en caso contrario se añade al array de errores el valor para titulo
        $errores['titulo'] = "El titulo es obligatorio";
    }

    if (isset($_POST['descripcion']) && $_POST['descripcion'] != "") {
        //La descripcion debe tener un minimo de longitud
        if (strlen($_POST['descripcion']) >= MIN_DESCRIPCION) {
            $descripcion = $_POST['descripcion'];
        } else {
            $errores['descripcion'] = "Longitud minima necesaria de " . MIN_DESCRIPCION;
        }
    } else {
        $errores['descripcion'] = "es obligatorio";
    }

    if (isset($_POST['fecha']) && $_POST['fecha'] != "") {
        $fecha = $_POST['fecha'];
        $hoy = new DateTime("now");
        if ($hoy < new DateTime($fecha)) {
            $errores['fecha'] = "Fecha no valida";
        }
    }

    if (isset($_POST['permanente']) && $_POST['permanente']!=""){
        $permanente = $_POST['permanente'];//on
    }

    if($permanente == "" && $fecha ==""){
        $errores['momento'] = "Debes rellenar un campo";
    }elseif($permanente !="" && $fecha !=""){
        $errores['momento'] = "Solo puedes elegir uno de los dos";
    }

    if(isset($_POST['nombre'])&& $_POST['nombre']!=""){
        $nombre = $_POST['nombre'];
    }

    //¿Hay errores?
    if(empty($errores)){
        $data = file_get_contents(FILE_DATA);
        $data .= "\n$titulo;$descripcion;" . (($permanente != "") ? "permanente" : $fecha) . ";$nombre";
        file_put_contents(FILE_DATA, $data);

        //header("Location: index.php?msg=success");
    }
}
?> 

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
    <style>
        *{
            margin:5px
        }
        .error {
            color: red;
            font-size: 0.8em;
        }

        .success {
            color: green;
            font-size: 0.8em;
        }
    </style>
</head>

<body>
    <h2>Formulario PHP</h2><br>

    <?php if($msg!=""){
        echo "<h1 class='success'>$msg</h1>";
    }?>
    <form action="" method="post">
        <label for="titulo">Titulo</label>
        <?php if (isset($errores['titulo'])) { ?>
            <span class="error">
                <?= $errores['titulo'] ?>
            </span>
        <?php } ?>
        <br>
        <input type="text" name="titulo" placeholder="Incidencia" value=<?= $titulo ?>><br>

        <label for="descripcion">Descripcion</label>
        <?php if (isset($errores['descripcion'])) { ?>
            <span class="error">
                <?= $errores['descripcion'] ?>
            </span>
        <?php } ?>
        <br>
        <textarea name="descripcion" id="" cols="20" rows="10" placeholder="Por favor cuentanos que sucede..."><?=$descripcion ?></textarea><br>
        <br><p>- - - Elige Uno - - -</p><br>
        <?php if(isset($errores['momento'])){ ?>
            <span class="error"><?=$errores['momento'] ?></span>
        <?php } ?>
        <br>
        <label for="fecha">¿Cuando ocurrió?</label>
        <?php if (isset($errores['fecha'])) { ?>
                    <span class="error"><?= $errores['fecha'] ?></span>
            <?php } ?>
            <br>
        <input type="date" name="fecha"><br>

        <label for="permanente">Permanente</label>
        <input type="checkbox" name="permanente" <?= ($permanente != "") ? 'checked' : '' ?>><br>
        <br><p>- - - Opcionales - - -</p><br>
        <label for="nombre">Nombre</label><br>
        <input type="text" name="nombre" placeholder="Di tu nombre"><br>
        <input type="submit" name="enviar" value="Enviar">
    </form>
</body>
</html>