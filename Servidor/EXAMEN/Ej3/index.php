<?php
//entiendo que solo en el nombre puede habar errores y solo ahí hay peligros de xss y sql injection
//me arrepiento de no haber hecho copypaste del singleton en vez de ir abriendo y cerrando la conexión todo el rato.
//perdón que sé que es deuda tecnológica y que para algo tan peque no tiene sentido además cerrar todo el rato la conexión.
try {
    $db = new PDO('mysql:host=localhost;dbname=examen;charset=utf8mb4', 'examen', 'examen');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "ERROR" . $e->getMessage();
    die();
}

$consulta = $db->prepare("SELECT nombre FROM categoria");
$categorias = $consulta->execute();
$categorias = $consulta->fetchAll(PDO::FETCH_ASSOC);

foreach ($categorias as $categoria){
    $opcionesCategoria = $categoria;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $errores = [];
    $nombre = $_POST["nombre"]?? "";
    Sanitizer::sanitizeString($datos['nombre']);
    if (empty($nombre)) {
       $erorres["nombre"] = "Nombre no válido";
    } 

    try {
        $db = new PDO('mysql:host=localhost;dbname=examen;charset=utf8mb4', 'examen', 'examen');
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo "ERROR" . $e->getMessage();
        die();
    }

    $sql = "INSERT INTO inscripcion (nombre, protesis, horario) VALUES (:nombre, $protesis, $horario)";
    $stmt = $db->prepare($sql);
    
    $stmt->bindValue(':nombre', $nombre, PDO::PARAM_STR);

    $stmt->execute();
    $db = null;
}
//$opcionesCategoria = ["Junior", "Adolescentes", "Jóvenes", "Adultos", "Menos Adultos", "Aún menos adultos", "Mayores", "Abuelos", "Jurásico"];


// if (isset($_POST["nombre"]) && ($_POST["categoria"]) && ($_POST["correo"])) {
//     $nuevaInscripcion = $db->prepare("INSERT INTO ToDo (nombre,categoria) VALUES (:nombre, :categoria)");
//     $nuevaInscripcion->bindParam(':nombre', $nombre, PDO::PARAM_STR);
//     $nuevaInscripcion->bindParam(':categoria', $categoria, PDO::PARAM_INT);
//     if (isset($_POST["descripcion"])) {
//         $nuevaInscripcion->bindParam(':descripcion', $descripcion, PDO::PARAM_STR);
//     } else {
//         $descripcion = null;
//         $nuevaInscripcion->bindParam(':descripcion', $descripcion, PDO::PARAM_NULL);
//     }
//     $resultado = $nuevaInscripcion->execute();
//     mantenerDatosPag($page, $orderby, $order);
//     $tareaIncluida = "La nombre se ha incluido con exito.";
// } else {
//     $tareaIncluida = "";
// }


// //Hacemos la consulta
// $consulta = $db->prepare("SELECT * FROM ToDo ORDER BY :orderby $order LIMIT :limite OFFSET :offset");
// //Hacemos los bindParam
// $consulta->bindParam(':orderby', $orderby, PDO::PARAM_INT);
// $consulta->bindValue(':limite', NUM_ELEM_POR_PAG, PDO::PARAM_INT);
// $consulta->bindValue(':offset', NUM_ELEM_POR_PAG * ($page - 1), PDO::PARAM_INT);
// //La ejecutamos
// $results = $consulta->execute();
// //Guardamos los datos obtenidos en un array asociativo
// $datosDB = $consulta->fetchAll(PDO::FETCH_ASSOC);
// //Para paginar
// $consulta_count = $db->query('SELECT Count(id) AS N FROM ToDo'); // Contamos las filas
// $count = $consulta_count->fetch();
// $numPages = ceil($count[0] / NUM_ELEM_POR_PAG); // calculamos num de paginas


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Prestamo de prótesis</title>
</head>

<body>
    <style>
        .success-msg{
            color: green;
        }
        .error{
            color: red;
        }
    </style>
    <?php if ($msg != "" && empty($errores)) { ?>
        <div id="success" class="success">
            <div class="success-msg">
                <p>Todo salió bien.</p>
            </div>
        </div>
    <?php } ?>
    <?php
    try {
        $db = new PDO('mysql:host=localhost;dbname=examen;charset=utf8mb4', 'examen', 'examen');
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo "ERROR" . $e->getMessage();
        die();
    }

    $consulta = $db->prepare("SELECT * FROM inscripciones");
    $categorias = $consulta->execute();
    $categorias = $consulta->fetchAll(PDO::FETCH_ASSOC);

     if ($query->num_rows <= 0){
    echo "<h3> No hay resultados </h3>";

    }else{
    echo "<table>";
    echo "<thead>";
    echo "<tr>";

    echo "<th> Nombre </th> ";
    echo "<th> Protesis </th> ";
    echo "<th> Horario </th> ";
    echo "<th> Categoria </th> ";

    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";

    $inscripciones = $consulta->fetchAll(PDO::FETCH_ASSOC);
    foreach ($inscripciones as $fila){
        echo "<tr>";

        echo "<td>" . $fila["nombre"] . "</td>";
        echo "<td>" . $fila["protesis"] . "</td>";
        echo "<td>" . $fila["horario"] . "</td>";
        echo "<td>" . $fila["categoria"] . "</td>";
        
        echo "</tr>";

    }

    echo "</tbody>";
    echo "</table>";
    } 
    ?>

    <h1>Prótesis: </h1>

    <div id="formularioProtesis">
        <h2>Rellene el formulario:</h2>
        <form method="post" action="#">
            <label for="nombre">Nombre:</label><br>
            <input type="text" name="nombre" value="<?= $nombre ?>" placeholder="Tu nombre"><br>
            <?php if (isset($errores['nombre'])) { ?>
                <span class="error">
                    <?= $errores['nombre'] ?>
                </span>
            <?php } ?><br>
            <!-- checkbox -->
            <label for="protesis">Prótesis</label><br>
            <label>1<input type="radio" name="protesis" value="1" <?= ($protesis == "s") ? 'checked' : '' ?>></label>
            <label>2<input type="radio" name="protesis" value="2" <?= ($protesis == "n") ? 'checked' : '' ?>></label>
            <!-- select -->
            <label for="categoria"></label><br>
            <select name="categoria" id="categoria">
                <?php 
                    array_walk(
                        $opcionesCategoria,
                        function($op, $k, $d){
                            $sel = ($op==$d)?"selected":"";
                            echo "<option value='$op' $sel>$op</option>";
                        },
                        $categoria
                    );
                ?>
            </select>
            <label>Horario Mañana<input type="radio" name="horario" value="m" <?= ($horario == "m") ? 'checked' : '' ?>></label>
            <label>Horario Tarde<input type="radio" name="horario" value="t" <?= ($horario == "t") ? 'checked' : '' ?>></label><br>
            <?php if (isset($errores['horario'])) { ?>
                <span class="error">
                    <?= $errores['horario'] ?>
                </span><br>
            <?php } ?>
            <input type="submit" value="Enviar" name="enviar">
        </form>
    </div>
   
</body>

</html>