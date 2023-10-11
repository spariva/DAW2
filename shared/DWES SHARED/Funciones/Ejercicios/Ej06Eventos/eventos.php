<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eventos</title>
</head>
<body>
    <div class="cuadro">
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <label for="nombre">Introduce el nombre del Evento:</label>
            <label for="fecha">Introduce la fecha:</label>
            <label for="ubicacion">Introduce la ubicacion:</label>
        </form>
    </div>
    <br>
    <div class="texto"></div>
<?php
function mostrarEvento():string{
    global $arrayEventos;
    $txt = "<table>";
    $txt .= "<tr><th>Evento</th><th>Nombre</th><th>Fecha</th><th>Ubicación</th><th>Acciones</th></tr>";
    for($i=0;$i<count($arrayEventos);$i++){
        $txt .= "<tr>";
        $txt .= "<td>Evento ".$i."</td>";
        $txt .= "<td>".$arrayEventos[$i]->nombre."</td>";
        $txt .= "<td>".$arrayEventos[$i]->fecha."</td>";
        $txt .= "<td>".$arrayEventos[$i]->ubicacion."</td>";
        $txt .= "<td><form method='POST'><input type='hidden' name='delete' value='".$i."'><input type='submit' value='Delete'></form></td>";
        $txt .= "</tr>";
    }
    $txt .= "</table>";
    return $txt;//lo saca en un div
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["nombre"]) && isset($_POST["fecha"]) && isset($_POST["ubicacion"])) {
        $nombre = $_POST["nombre"];
        $fecha = $_POST["fecha"];
        $ubicacion = $_POST["ubicacion"];

        class Evento {
            public $nombre;
            public $fecha;
            public $ubicacion;

            public function __construct($nombre, $fecha, $ubicacion) {
                $this->nombre = $nombre;
                $this->fecha = $fecha;
                $this->ubicacion = $ubicacion;
            }
        }

        $evento = new Evento($nombre, $fecha, $ubicacion);

        $arrayEventos = [];
        array_push($arrayEventos, $evento);
    } elseif (isset($_POST["delete"])) {
        $index = $_POST["delete"];
        unset($arrayEventos[$index]);
        $arrayEventos = array_values($arrayEventos);
    } else {
        echo "Error: missing POST variables";
        exit();
    }
}
?>
</body>
</html>

