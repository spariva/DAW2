<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Alumnos</title>
</head>
<body>

<h1>Lista de Alumnos:</h1>

    <?php
    class Alumno {
        public $nombre;
        public $edad;

        public function __construct($nombre, $edad) {
            $this->nombre = $nombre;
            $this->edad = $edad;
        }
    }

    $alumnos = array(
        new Alumno("Juan", 20),
        new Alumno("María", 22),
        new Alumno("Pedro", 21),
        new Alumno("Laura", 23)
    );

    foreach($alumnos as $alumno) {
        echo "<p>Nombre: " . $alumno->nombre . ", Edad: " . $alumno->edad . "</p>";
    }
    ?>
    <br><br>
    Alumno mas joven usando <b>bucle while:</b> 
    <?php
        //creamos variables para guardar los datos inicialmente poonemos el primero
        $edadMasJoven = $alumnos[0]->edad;
        $nombreMasJoven = $alumnos[0]->nombre;

        $i = 1;
        while ($i < count($alumnos)) {
            if ($alumnos[$i]->edad < $edadMasJoven) {
                $edadMasJoven = $alumnos[$i]->edad;
                $alumnoMasJoven = $alumnos[$i]->nombre;
            }
            $i++;
        }

        echo $nombreJoven . " con " . $edadJoven . " años.";
    ?>
    <br><br><br>

    Alumno mas joven usando la funcion <b>min():</b>
    <!--TODO: HAY QUE HACERLO CON REDUCE TMBN-->
    <? php
        function jovenzagal($arr){
            $arr.reduce(    )
        }
        $jovenzuelo
        echo $jovenzuelo . " tiene " . $edadJovenzuelo;
    ?>
    <?php
        $edades = array_column($alumnos, 'edad');
        $edadMasJoven = min($edades);

        echo $nombreJoven . " con " . $edadJoven . " años.";
    ?>
    <br><br><br>

    <!--Tabla de alumnos ordenada por edad:-->
    Alumnos ordenados por edad:
    <br><br>
    <table border="1">
        <tr>
            <th>Nombre</th>
            <th>Edad</th>
        </tr>
    <?php
    array_multisort($edades,SORT_ASC, $alumnos);

    foreach($alumnos as $alumno) {
        echo "<tr><th>" . $alumno->nombre . "</th><th>" . $alumno->edad . "</th></tr>";
    }
    
    ?>
    </table>

</body>
</html>





