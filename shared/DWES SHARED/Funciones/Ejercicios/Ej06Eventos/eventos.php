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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $fecha = $_POST["fecha"];
    $ubicacion = $_POST["ubicacion"];

    class Evento($nombre, $fecha, $ubicacion){
        $nombre = $this.nombre;
        $fecha = $this.fecha;
        $ubicacion = $this.ubicacion;
    }

    $evento = new Evento($nombre, $fecha, $ubicacion);

    $arrayEventos = [];
    array_push($arrayEventos, $evento);
}

    function mostrarEvento():string{
        $txt="";
        for($i=0;$i<count($arrayEventos);$i++){
            txt += "Evento"+$i+": NOMBRE: "+$arrayEventos.nombre[$i]+"; FECHA: "+
            $arrayEventos.fecha[$i]+"; UBICACION: "+$arrayEventos.ubicacion[$i];
        }
        return txt;//lo saca en un div
    }

    function modificarEvento():void{
        //coge los eventos y metelos en un formulario

    }

    function mostrarTablaEvento():void{
        //imprime un tr con tds
 
    }


?>
</body>
</html>

