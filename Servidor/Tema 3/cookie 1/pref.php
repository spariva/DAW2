<?php 

include_once 'colors.php';
$error = [];

if (isset($_GET['color'])){
    if(array_search($_GET['color'], $colors) !== false){
        
        
        $_COOKIE = 
}

?>
<?php
$colors = array("red", "blue", "green", "yellow");

if (isset($_GET['color'])) {
    $selectedColor = $_GET['color'];
    setcookie('color', $selectedColor, time() + (86400 * 30), "/"); // Set the color cookie for 30 days
} else {
    if (isset($_COOKIE['color'])) {
        $selectedColor = $_COOKIE['color'];
    } else {
        $selectedColor = $colors[0]; // Default color
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
    <?php foreach ($colors as $color) { ?>
        <a href="?color=<?php echo $color; ?>">
            <div class="box" style="background-color: <?php echo $color; ?>">
                <?php echo ucfirst($color); ?>
            </div>
        </a>
    <?php } ?>
</body>
</html>
