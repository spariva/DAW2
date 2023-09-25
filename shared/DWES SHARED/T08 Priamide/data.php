<?php

function imprimir(int $num){
    $simbolo= '  *  ' ;
    for($i=0;$i<$num;$i++){
        for($e=0;$e<=$i;$e++){
            echo "$simbolo";
        }
        echo"<br>";
    }
}

?>