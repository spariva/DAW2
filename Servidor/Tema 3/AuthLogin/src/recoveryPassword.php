<?php 
session_start();

try {
    $db = new PDO('mysql:host=localhost;dbname=menosdaw','menosdaw','1234');
    $consulta = $db->prepare("SELECT * FROM Comida WHERE id = :id ");
    $consulta->bindParam(":id", $id, PDO::PARAM_INT);
    $resultado = $consulta->execute();
    
    if($resultado){
        $receta = $consulta->fetch();
        return $receta;
    } else{
        $receta = null;
    }

    
    
    //print_r($receta);

}catch(PDOException $e){
    echo "ERROR:" . $e->getMessage();
    die();
}

// if(isset($_SESSION['nombreUsuario']) && $_SESSION['nombreUsuario'] != ""){
    try {
        $mbd = new PDO('mysql:host=localhost;dbname=proyecto01_juan_de_la_cierva', "juan", "cierva1234");
    
        // Utilizar la conexión aquí
        $resultado = $mbd->query('SELECT * FROM cosas');
    
        foreach ($resultado as $fila){
          foreach ($fila as $clave => $valor){
            echo $clave . " " . $valor . "\n";
          }
          echo "--------------\n";
        }
    
        // Ya se ha terminado; se cierra
        $resultado = null;
        $mbd = null;
    
    } catch (PDOException $e) {
        print "¡Error!: " . $e->getMessage() . "\n";
        die();
    }