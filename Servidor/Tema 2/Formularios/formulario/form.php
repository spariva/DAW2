<?php
require_once 'init.php';

function pintarErrores($errores){
    $campos = ['nombre', 'direccion', 'suscripcion', 'genero'];
    $html = "<span class='error'> Errores : </span><br>";
    foreach ($campos as $campo){
        if (isset($errores[$campo]) && !empty($errores[$campo])) {
            $html .= "<span class='error'>" . $campo .": ". $errores[$campo] . "</span><br>";
        }
    }
    return $html;
}
//?Selects pintar 
function pintarSelects($generos, $genero){
    foreach ($generos as $g){
        $selected = ($g['genero_id'] == $genero) ? 'selected' : '';
        $html .= "<option value='" . $g['genero_id'] . "' $selected>" . $g['nombre'] . "</option>";
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
$mensajesError = [];
$nombre = '';
$direccion = '';
$suscripcion = '';
$genero = '';

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
    
    if (empty($mensajesError)){
        $mdb = DbConnection::getInstance();
        $db = $mdb->getConnection();

        $sql = "INSERT INTO clientes (nombre, direccion, suscripcion) VALUES (:nombre, :direccion, :suscripcion)";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':direccion', $direccion);
        $stmt->bindParam(':suscripcion', $suscripcion);
        $stmt->execute();

        $cliente_id = $db->lastInsertId();

        $sql = "INSERT INTO clientes_generos (cliente_id, genero_id) VALUES (:cliente_id, :genero_id)";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':cliente_id', $cliente_id);
        $stmt->bindParam(':genero_id', $genero);
        $stmt->execute();
        

        header('Location: success.php');
        exit();

    } else {
        $error = $mensajesError;
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
    if (isset($error) && !empty($error)){
        $htmlErrores = pintarErrores($error);
        echo $htmlErrores;
    }
    ?>
    <form method="POST" action="<?= $_SERVER['PHP_SELF']?>">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" value="<?= htmlspecialchars($nombre) ?>">
        <br>
        <label for="direccion">Dirección:</label>
        <input type="text" id="direccion" name="direccion" value="<?= htmlspecialchars($direccion); ?>">
        <br>
        <label for="suscripcion">Suscripción:</label>
        <input type="radio" id="suscripcion" name="suscripcion" value="trimestral" <?= (isset($suscripcion) && $suscripcion == "trimestral") ? 'checked' : '' ?>>Trimestral
        <input type="radio" id="suscripcion" name="suscripcion" value="mensual"  <?= (isset($suscripcion) && $suscripcion == "mensual") ? 'checked' : '' ?>>Mensual
        <br>
        <label for="genero">Género:</label>
        <select name="genero" id="genero">
            <?= pintarSelects($generos, $genero); ?>
        </select>
        <br>
        <input type="submit" value="Enviar">
    </form>
</body>
</html>