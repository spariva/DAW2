<?php

$mail = $_POST['mail'];
$errores = [];

$sanitizedMail = filter_var($mail, FILTER_SANITIZE_EMAIL);
if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
    $errores['mail'] = "El mail no es válido";
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form>
        <input type="email" value="<?= $mail ?>"/>
        <input type="submit" value="Enviar"/>
    </form>
    <?= $errores['mail'] ?>
    <?= $sanitizedMail ?>
</body>
</html>