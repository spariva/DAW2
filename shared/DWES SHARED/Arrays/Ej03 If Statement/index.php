<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>If Statement</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <td>
    <?php

    class Evento {
        public $nombre;
        public $fecha;

        public function __construct($nombre, $fecha) {
            $this->nombre = $nombre;
            $this->fecha = $fecha;
        }
    }

    $arrayEventos = array(
        new Evento("Mad Cool", date("Y-m-d", strtotime("2022-02-25"))),
        new Evento("Primavera Sound", date("Y-m-d", strtotime("2023-08-19"))),
        new Evento("Boombastic", date("Y-m-d", strtotime("2023-12-23"))),
        new Evento("Riverland", date("Y-m-d", strtotime("2024-08-24")))
    );

    $fecha_actual = date("Y-m-d");
    echo "Fecha actual: ".$fecha_actual."<br><br>";
    
    echo "<table border='1'>
            <tr>
                <th>Lista de Eventos</th>
            </tr>";
    
    for ($i = 0; $i < count($arrayEventos); $i++) {
        if ($fecha_actual > $arrayEventos[$i]->fecha) {
            //PROBAR DATE_DIFF O FORMATO FECHA CON '' EN LUGAR DE "" Y COMPARAR
            echo "<tr class='annoAnterior'>
                    <td>" . $arrayEventos[$i]->nombre . "</td>
                    <td>" . $arrayEventos[$i]->fecha . "</td>
                  </tr>";
        }else{
            echo "<tr class='annoFuturo'>
            <td>" . $arrayEventos[$i]->nombre . "</td>
            <td>" . $arrayEventos[$i]->fecha . "</td>
          </tr>";
        }
    }
    
    echo "</table>";
    ?>
    </td>
    
</body>
</html>