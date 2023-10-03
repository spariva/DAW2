<?php
$impar = function(int $num):bool{
    if(($num%2)!=0){
        return true;
    }
    return false;
};

function filtra_array(callable $impar, int ...$valores): array{

    $filtrado= [];

    foreach($valores as $value){
        if($impar($value)){
            $filtrado[]=$value;
        }
    }

    return $filtrado;

}

print_r(filtra_array($impar, 1, 4, 56, 7, 8));

?>

