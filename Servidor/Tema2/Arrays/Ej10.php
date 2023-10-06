<?php 
include ('data.php');
?>
<!DOCTYPE html>
<html>
<head>
    <title>Lista de Películas y Series</title>
</head>
<body>
    <h1>Mis Películas y Series</h1>

    <?php
    // Verificar si el archivo JSON existe
    $file = 'movies.json';
    if (file_exists($file)) {
        // Leer el contenido del archivo JSON
        $data = file_get_contents($file);
        $movies = json_decode($data, true);// Para que sea arr asociativo y no objeto pongo el true.

        if (!empty($movies)) {
            echo '<ul>';
            foreach ($movies as $title => $rating) {
                echo '<li>' . $title . ' (Rating: ' . $rating . ')';
                if ($rating === "Quiero ver") {
                    echo ' - ¡Quiero ver esta película/serie!';
                }
                echo '</li>';
            }
            echo '</ul>';
        } else {
            echo 'No hay películas o series almacenadas.';
        }
    } else {
        echo 'El archivo JSON no existe.';
    }
    ?>

    <h2>Agregar una Nueva Película o Serie</h2>
    <form action="add_movie.php" method="post">
        Título: <input type="text" name="title" required><br>
        Rating: <input type="text" name="rating" required><br>
        <input type="submit" value="Agregar">
    </form>
</body>
</html>
