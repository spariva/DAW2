<?php
$alCubo = function(int $num):int{
    return ($num * $num);

};

function filtra_array(callable $alCubo, int ...$valores): array{

    $filtrado= [];
    foreach($valores as $value){
        $filtrado[]=$alCubo($value);
    }
    return $filtrado;

}

print_r(filtra_array($alCubo, 1, 4, 56, 7, 8));

?>