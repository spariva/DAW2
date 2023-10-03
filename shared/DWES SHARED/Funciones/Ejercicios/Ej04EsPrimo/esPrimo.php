<?php
$esPrimo = function(int $num):bool{

    if ($num <= 1) {
        return false;
    }

    for($i= ($num-1); $i>1; $i--){
        if($num % $i ==0){
            return false;
        }
    }
    return true;

};

function filtra_array(callable $esPrimo, int ...$valores): array{

    $filtrado= [];

    foreach($valores as $value){
        if($esPrimo($value)){
            $filtrado[]=$value;
        }
    }

    return $filtrado;

}

print_r(filtra_array($esPrimo, 1, 4, 56, 7, 8));

?>