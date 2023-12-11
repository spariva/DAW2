<?php
function concatenarPalabras(string &$acc, mixed ...$palabras){
    for($i=0; $i<=count($palabras);$i++){
        $acc .= "' '.$palabras[$i]";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendar</title>
</head>
<body>
    <?php 
    $acc="inicio";
    concatenarPalabras($acc, ["hola", "caracola"]);
    echo $acc;
    ?>
</body>
</html>