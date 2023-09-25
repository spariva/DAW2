<?php
include('data.php');
?>
<!DOCTYPE html>
<html>
<head>
    <title>Tecno Party</title>
    <meta http-equiv="refresh" content="1"> 
    <style>
        .bloque1 {
            width: 19%;
            height: 2000px;
            display: inline-block;
            background-color: <?php echo colorAleatorio(); ?>;
        }

        .bloque2 {
            width: 19%;
            height: 2000px;
            display: inline-block;
            background-color: <?php echo colorAleatorio(); ?>;
        }

        .bloque3 {
            width: 19%;
            height: 2000px;
            display: inline-block;
            background-color: <?php echo colorAleatorio(); ?>;
        }

        .bloque4 {
            width: 19%;
            height: 2000px;
            display: inline-block;
            background-color: <?php echo colorAleatorio(); ?>;
        }

        .bloque5 {
            width: 19%;
            height: 2000px;
            display: inline-block;
            background-color: <?php echo colorAleatorio(); ?>;
        }
    </style>
</head>
<body>
    <?php

    function colorAleatorio(){
        $rojo = rand(0,255);
        $verde = rand(0,255);
        $azul = rand(0,255);
        return "rgb($rojo,$verde,$azul)";

    }?>

    <div class="bloque1"></div>
    <div class="bloque2"></div>
    <div class="bloque3"></div>
    <div class="bloque4"></div>
    <div class="bloque5"></div>
</body>
</html>