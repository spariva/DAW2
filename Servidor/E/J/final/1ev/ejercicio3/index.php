<?php

date_default_timezone_set("Europe/Madrid");

$user = $_SERVER["HTTP_USER_AGENT"];
$time = $_SERVER["REQUEST_TIME"];

$options = [
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
];

try {
    $conn = new PDO("mysql:host=localhost;dbname=examen", "examen", "examen", $options);
} catch (PDOException $e) {
    echo $e;
}
$stmt = $conn->prepare("INSERT INTO Logs (navegador, timestamp) VALUES (:navegador, :timestamp)");

$stmt->bindParam(":navegador", $user);
$stmt->bindParam(":timestamp", $time);

$stmt->execute();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log</title>
</head>

<body>
    <?= "Hola mundo!" ?>
    <br>
    <a href="log.php">Listado log</a>
</body>

</html>