<?php

include('colors.php');

$color = $colors[0];
if (isset($_COOKIE['color']) && in_array($_COOKIE['color'], $colors)) {
    $color = $_COOKIE['color'];
    setcookie('color', $_COOKIE['color'], time() + (60*60*24*7));//cada vez que revisites se vuelve a setear para que te vuelva a dar una semana.
}

function imprimirAvisoCookies() {
    echo '<div style="background-color: #f8f8f8; padding: 10px; text-align: center; position: absolute">';
    echo 'Esta web utiliza cookies. Acepta el uso de cookies o lo lamentarás.';
    echo '<br>';
    echo '<a href="?privacy=1">Aceptar</a>';
    echo '</div>';
}

if (!isset($_COOKIE['privacy'])){
    imprimirAvisoCookies();    

    if (isset($_GET['privacy']) && $_GET['privacy'] == '1'){
        setcookie('privacy', '1', time() + (60*60*24*7));
    } else {
        setcookie('privacy', '0', time() + (60*60*24*7));
    }
}


?>

<!DOCTYPE html>
<html>
<head>
    <title>My Blog</title>
    <style>
        body {
            background-color: <?php echo $color; ?>;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }
        .post {
            margin-bottom: 20px;
            padding: 10px;
            background-color: #fff;
        }
        .post h2 {
            font-size: 24px;
            margin-bottom: 10px;
        }
        .post p {
            font-size: 16px;
            line-height: 1.5;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="post">
            <h2>Blog Post 1</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam auctor, nunc id aliquam luctus, nisl nunc fringilla justo, id lacinia nunc nunc in nunc.</p>
        </div>
        <div class="post">
            <h2>Blog Post 2</h2>
            <p>Integer euismod, mauris sit amet lacinia lacinia, nunc nunc aliquet nunc, nec aliquam nunc nunc in nunc.</p>
        </div>
        <div class="post">
            <h2>Blog Post 3</h2>
            <p>Etiam auctor, nunc id aliquam luctus, nisl nunc fringilla justo, id lacinia nunc nunc in nunc.</p>
        </div>
        <a href="pref.php">Change color</a>
    </div>
</body>
</html>

