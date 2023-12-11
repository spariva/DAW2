<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div id="contenedor">
    <form action="data.php" method="post">
        Título: <input type="text" name="title" required><br>
        Rating: <input type="text" name="rating"><br>
        <input type="submit" value="Agregar">
    </div>
    <?php
    $pelis = [];
    $pelisPorVer = [];

    function addMovie(){
        

    }
    ?>
</body>
</html>