<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $title = $_POST["title"];
    //$title = (isset($_POST['title']))?$_POST["title"]:"";// No sé si mejor hacerlo así o como arriba ? 
    $rating = $_POST["rating"];

    if (empty($title) || empty($rating)) {
        echo "Título y Rating son campos requeridos.";
    } else {
        $file = 'movies.json';//esto debería ser un array ??

        // Leer el contenido actual del archivo JSON
        $data = file_get_contents($file);
        $movies = json_decode($data, true);

        // Agregar la nueva película/serie al arreglo
        $movies[$title] = $rating;

        // Convertir el arreglo actualizado a formato JSON
        $newData = json_encode($movies);

        // Guardar los datos en el archivo JSON
        file_put_contents($file, $newData);

        header("Location: index.php");
    }
}
?>
