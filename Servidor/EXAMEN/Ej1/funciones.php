<?php 
//Todas las funciones del ejercicio aquí:
define ('NOMBRES', 'nombres.dat');
define ('APELLIDOS', 'apellidos.dat');
define('DOC_ROOT', dirname(__FILE__));

spl_autoload_register(
    function($class){
        require(DOC_ROOT."/clases/$class.php");
    }
);


// spl_autoload_register(function($class) {
//     $file = str_replace("\\", DIRECTORY_SEPARATOR, $class);
//     $path = DOC_ROOT . DIRECTORY_SEPARATOR . "src" . DIRECTORY_SEPARATOR . "php" . DIRECTORY_SEPARATOR . $file . ".php";
//     if (file_exists($path)) {
//         require $path;
//     } else {
//         throw new Exception("Cannot load class: $class");
//     }
// });

function randomPeople(int $numberPeople) : array {
    $people = [];
    $nombres = explode("\n" , file_get_contents(NOMBRES));
    $apellidos = explode("\n" , file_get_contents(APELLIDOS));

    for($i = 0; $i < $numberPeople; $i++) {
        //Randomizo hasta 12, dos veces
        $primera = mt_rand(0,11);
        $segunda = mt_rand(0,11);

        //Cojo un nombre y dos apellidos
        $tempNombre = $nombres[$primera];
        $tempApellido = $apellidos[$segunda];
        $tempApellido2 = $tempApellido[$primera];
        $tempEdad = mt_rand(7, 122);

        $tempPersona = new Persona($tempNombre, $tempApellido, $tempApellido2, $tempEdad);
        $people[] = array_push($people, $tempPersona);
    }

    return $people;
}

function generateMatches(array $participants): array{
    $matches = [];
    //En cada bucle interno el jugador[$i] juega contra cada uno excepto contra sí misme.
    for($i = 0; $i < $participants; $i++) { 
        for ($j = 0; $j <= $i; $j++) {
            $k = $j + 1;
            $matches = array_push($matches, "Partido: " . $participants[$i] . " vs " . $participants[$k]);
        }
    }
    return $matches;
}

// function generateSorteo(array $matches, date $time, ): array{

// }


