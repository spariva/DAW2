<?php
include_once 'DbConnection.php';

try {
    $db = DbConnection::getInstance();
    $conn = $db->getConnection();

    $sql = "SELECT * FROM clientes";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $txt = "";
    $txt .='<table class="mitabla">';
    $txt .= "<tr><th>ID</th><th>Nombre</th><th>Direccion</th><th>Suscripcion</th></tr>";
    
    foreach ($results as $row) {
        $txt .= "<tr>";
        $txt .= "<td>{$row['cliente_id']}</td>";
        $txt .= "<td>{$row['nombre']}</td>";
        $txt .= "<td>{$row['direccion']}</td>";
        $txt .= "<td>{$row['suscripcion']}</td>";
        $txt .= "</tr>";
    }

    $txt .= "</table>";

    $sql = "SELECT * FROM clientes_generos";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $txt .= "<br>";
    $txt .='<table class="mitabla">';
    $txt .= "<tr><th>cliente</th><th>genero</th></tr>";
    
    foreach ($results as $row) {
        $txt .= "<tr>";
        $txt .= "<td>{$row['cliente_id']}</td>";
        $txt .= "<td>{$row['genero_id']}</td>";
        $txt .= "</tr>";
    }

    $txt .= "</table>";

    $sql = "SELECT * FROM generos_musicales";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $txt .= "<br>";
    $txt .='<table class="mitabla">';
    $txt .= "<tr><th>id</th><th>genero</th></tr>";
    
    foreach ($results as $row) {
        $txt .= "<tr>";
        $txt .= "<td>{$row['genero_id']}</td>";
        $txt .= "<td>{$row['nombre']}</td>";
        $txt .= "</tr>";
    }

    $txt .= "</table>";
} catch (PDOException $pe) {
    header("Location: verBD.php?error=". $pe->getMessage());
    die();
} finally {
    $db->closeConnection(); // Cerrar la conexión al finalizar
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver clientes</title>
    <style>
        *{
            text-align:center;
            padding:7px;
        }

    </style>
</head>
<body>
    <?php echo $txt ?>
    <br><br>
    <a href="index.php">Volver a Formulario</a>
</body>
</html>