<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial sacle=1.0">
    <title>Pantone</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <?php
    $incremento=20;
    for($i=0;$i<=255;$i+=$incremento){
        $color=sprintf("#%02X%02X%02X",$i,$i,255);
        echo $color;
    ?>
    <div style="background-color:<?=$color ?>;"></div>
    <?php    
    }
    ?>
</body>
</html>
