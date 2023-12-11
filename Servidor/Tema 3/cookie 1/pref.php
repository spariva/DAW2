<?php 

include ('colors.php');
$error = [];

if (isset($_GET['color'])){
    if(array_search($_GET['color'], $colors) !== false){
        setcookie('color', $_GET['color'], time() + (86400 * 7), "/"); // 86400 = 1 day y el path / indica que aplica la cookie a todas las páginas
        header('Location: info.php');
        die();
    } else {
        $error['color'] = 'Color no válido';
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Colored Boxes</title>
    <style>
        .box {
            width: 100px;
            height: 100px;
            margin: 10px;
            display: inline-block;
            text-align: center;
            line-height: 100px;
            font-size: 20px;
            color: white;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <h2>Choose a color</h2>
    <?php if(isset($error['color'])) { ?>
        <p style="color: red;"><?= $error['color']; ?></p>
    <?php } ?>
    <?php foreach ($colors as $color) { ?>
        <a href="pref.php?color=<?php echo $color; ?>">
            <div class="box" style="background-color: <?= $color; ?>">
                <?php echo ucfirst($color); ?>
            </div>
        </a>
    <?php } ?>
</body>
</html>
