<?php
require_once 'init.php';

function pintarErrores($errores){
    $campos = ['nombre', 'direccion', 'suscripcion', 'genero'];
    $html = "<span class='error'> Errores : </span><br>";
    foreach ($errores as $i => $error){
        if (!empty($error)) {
            $html .= "<span class='error'>" . $campos[$i] .": ". $error . "</span><br>";
        }
    }
    return $html;
}
//?Selects pintar 
function pintarSelects($generos){
    foreach ($generos as $g){
        $html .= "<option value='{$g['id']}'>{$g['nombre']}</option>";
    }
    return $html;
}

try {
    $mdb = DbConnection::getInstance();
    $db = $mdb->getConnection();
    $sql = "SELECT * FROM generos_musicales";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $generos = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
    die();
}

//? Aquí empiezo a validar el formulario:
$mensajesError[] = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'] ?? ''; //lo mismo que el isset tal o vacío.
    $direccion = $_POST['direccion'] ?? '';
    $suscripcion = $_POST['suscripcion'] ?? '';
    $genero = $_POST['genero'] ?? '';

    if (empty($nombre)){
        $mensajesError['nombre'] = "El nombre es obligatorio";
    }

    if (empty($direccion)){
        $mensajesError['direccion'] = "La dirección es obligatoria";
    }

    if (empty($suscripcion)){
        $mensajesError['suscripcion'] = "La suscripción es obligatoria";
    }

    if (empty($genero)){
        $mensajesError['genero'] = "El género es obligatorio";
    }

    // if the user submited the form
    //     if there are form errors
    //         fill errors array
    //     else
    //         record data to database
    //         Location redirect, required by HTTP standard
    //         exit()
    // if we have some errors
    //     display errors
    //     fill form field values
    // display the form
    
    if (empty($mensajesError)){
        $mdb = DbConnection::getInstance();
        $db = $mdb->getConnection();

        $sql = "INSERT INTO clientes (nombre, direccion, suscripcion) VALUES (:nombre, :direccion, :suscripcion)";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':direccion', $direccion);
        $stmt->bindParam(':suscripcion', $suscripcion);
        $stmt->execute();

        $id_cliente = $db->lastInsertId();

        $sql = "INSERT INTO clientes_generos (id_cliente, id_genero) VALUES (:id_cliente, :id_genero)";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':id_cliente', $id_cliente);
        $stmt->bindParam(':id_genero', $genero);
        $stmt->execute();
        
        header('Location: success.php');
        exit();

    } else {
        $error = "Corrija los errores en el formulario";
        // convert the array to a string
        $mensajesErrorString = implode(", ", $mensajesError);
        header("Location: form.php?error=$mensajesErrorString");
    }
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Examen</title>
    <style>
        .error {
            color: red;
            font-size: 0.8em;
        }

        .success {
            color: green;
        }
    </style>
</head>
<body>
    <?php
    if (isset($_GET['error'])){
        $mensajesError = explode(", ", $_GET['error']);
        $htmlErrores = pintarErrores($mensajesError);
        echo $htmlErrores;
    }
    // if (isset($mensajesError) && !empty($mensajesError)){
       
    // }
    ?>
    <form method="POST" action="<?= $_SERVER['PHP_SELF']?>">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre">
        <br>
        <label for="direccion">Dirección:</label>
        <input type="text" id="direccion" name="direccion">
        <br>
        <label for="suscripcion">Suscripción:</label>
        <input type="radio" id="suscripcion" name="suscripcion" value="trimestral">Trimestral
        <input type="radio" id="suscripcion" name="suscripcion" value="mensual">Mensual
        <br>
        <label for="genero">Género:</label>
        <select name="genero" id="genero">
            <?= pintarSelects($generos); ?>
        </select>
        <br>
        <input type="submit" value="Enviar">
    </form>
</body>
</html>