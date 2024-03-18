<?php

class DbConnection {
    private static $instance;
    private $db;

    private function __construct() {
        $host = 'localhost';
        $dbname = 'examen';
        $username = 'examen';
        $password = 'examen';

        try {
            $this->db = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("No se pudo conectar a la base de datos $dbname: " . $e->getMessage());
        }
    }

    public static function getInstance() {
        if (!self::$instance) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function getConnection() {
        return $this->db;
    }

    public function closeConnection() {
        $this->db = null;
    }

    public function faltaStock($flor, $cantidad) {
        $sql = "SELECT * FROM flores WHERE id = :id LIMIT 1";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $flor, PDO::PARAM_STR);
        $stmt->execute();
        $florStock = $stmt->fetch(PDO::FETCH_ASSOC);

        if($florStock['stock'] < $cantidad){
            return true;
        }
        return false;
    }

    public function returnStock($flor, $cantidad) {
        $sql = "SELECT * FROM flores WHERE id = :id LIMIT 1";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $flor, PDO::PARAM_STR);
        $stmt->execute();
        $florStock = $stmt->fetch(PDO::FETCH_ASSOC);

        return $florStock['stock'];
    }

    public function actualizarStock($flor, $cantidad) {
        $mdb = $mdb = DbConnection::getInstance();
        $stock = $mdb->returnStock($flor, $cantidad);
        $newStock = $stock - $cantidad;
        $sql = "UPDATE INTO flores (stock) VALUES (:stock) WHERE id = :id LIMIT 1";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $flor, PDO::PARAM_STR);
        $stmt->bindParam(':stock', $newStock);
        $stmt->execute();
    }
}