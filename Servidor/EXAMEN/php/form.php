<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include_once 'DbConnection.php';


function pintarSelects($flores, $flor)
{
    foreach ($flores as $f) {
        $selected = ($f['id'] == $flor) ? 'selected' : '';
        $html .= "<option value='" . $f['id'] . "' $selected>" . $f['nombre'] . "(" . $f['stock'] . ")" . "</option>";
    }
    return $html;
}

try {
    $mdb = DbConnection::getInstance();
    $db = $mdb->getConnection();
    $sql = "SELECT * FROM flores";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $flores = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
    die();
}

$mensajesError = [];
$nombre = '';
$fecha = '';
$flor = '';
$cantidad = '';
$direccion = '';
$hoy = date("Y-m-d");

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['enviar'])) {
    $nombre = $_POST['nombre'] ?? ''; //lo mismo que el isset tal o vacío.
    $fecha = $_POST['fecha'] ?? '';
    $flor = $_POST['flor'] ?? '';
    $cantidad = $_POST['cantidad'] ?? '';
    $direccion = $_POST['direccion'] ?? '';

    if (empty($nombre)) {
        $mensajesError['nombre'] = "El nombre es obligatorio";
    }

    if (empty($fecha)) {
        $mensajesError['fecha'] = "La fecha es obligatoria";
    } else if ($fecha < $hoy) {
        $mensajesError['fecha'] = "La fecha tiene que ser posterior a hoy";
    }

    if (empty($cantidad)) {
        $mensajesError['cantidad'] = "La cantidad es obligatoria";
    } else if ($cantidad < 1) {
        $mensajesError['cantidad'] = "La cantidad tiene que ser como mínimo 1";
    }

    if (empty($direccion)) {
        $mensajesError['direccion'] = "La dirección es obligatoria";
    }

    //comprueba si hay stock (método en DbConnection)
    $mdb = DbConnection::getInstance();
    if ($mdb->faltaStock($flor, $cantidad)) {
        $mensajesError['stock'] = "Falta stock";
    }

    if (empty($flor)) {
        $mensajesError['flor'] = "El tipo de flor es obligatorio";
    }

    if (empty($mensajesError)) {
        //insert pedido
        try {
            $mdb = DbConnection::getInstance();
            $db = $mdb->getConnection();
            $sql = "INSERT INTO pedidos (flor_id, direccion, fecha, unidades) VALUES (:flor_id, :direccion, :fecha, :unidades)";
            $stmt = $db->prepare($sql);
            $stmt->bindParam(':flor_id', $flor);
            $stmt->bindParam(':direccion', $direccion);
            $stmt->bindParam(':fecha', $fecha);
            $stmt->bindParam(':unidades', $cantidad);
            $stmt->execute();
        } catch (PDOException $e) {
            echo "Error al hacer insert en pedidos: " . $e->getMessage();
            die();
        }

        // $mdb = DbConnection::getInstance(); 
        // $mdb->actualizarStock($flor, $cantidad);

        header('Location: exito.php');
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
        <title>Document</title>
        <link rel="stylesheet" href="css/estilo.css">
    </head>

    <body>

        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" id="nombre" value="<?= htmlspecialchars($nombre) ?>" required>
            <?php if (isset($mensajesError['nombre'])) { ?>
                <span class="error">
                    <?= $mensajesError['nombre'] ?>
                </span>
            <?php } ?>
            <!-- <span class="error">Debe tener nombre</span> -->
            <label for="fecha">Fecha</label>
            <input type="date" name="fecha" id="fecha" value="<?= htmlspecialchars($fecha) ?>" required>
            <?php if (isset($mensajesError['fecha'])) { ?>
                <span class="error">
                    <?= $mensajesError['fecha'] ?>
                </span>
            <?php } ?>
            <!-- <span class="error">Debe tener fecha</span>
        <span class="error">Debe ser posterior a hoy</span> -->

            <label for="flor">Flor</label>
            <select name="flor" id="flor" required>
                <?= pintarSelects($flores, $flor); ?>
            </select>
            <label for="cantidad">Cantidad</label>
            <input type="number" name="cantidad" id="cantidad" value="<?= htmlspecialchars($cantidad) ?>" required>

            <?php if (isset($mensajesError['cantidad'])) { ?>
                <span class="error">
                    <?= $mensajesError['cantidad'] ?>
                </span>
            <?php } ?>
            <?php if (isset($mensajesError['stock'])) { ?>
                <span class="error">
                    <?= $mensajesError['stock'] ?>
                </span>
            <?php } ?>

            <label for="cantidad">Direccion</label>
            <input type="text" name="direccion" id="direccion" value="<?= htmlspecialchars($direccion) ?>" required>

            <?php if (isset($mensajesError['direccion'])) { ?>
                <span class="error">
                    <?= $mensajesError['direccion'] ?>
                </span>
            <?php } ?>
            <!-- <span class="error">Debe tener cantidad</span> -->
            <!-- <span class="error">No hay stock</span> -->

            <input type="submit" value="enviar" name="enviar">
        </form>

    </body>

</html>