<?php

class DbConnection {
    private static $instance;
    private $db;

    private function __construct() {
        $host = 'localhost';
        $dbname = 'tiendamusica';
        $username = 'musical';
        $password = 'maki';

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

}