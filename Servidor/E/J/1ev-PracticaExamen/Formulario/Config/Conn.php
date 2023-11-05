<?php

namespace Config;

use \PDO;

class Conn {
    
    private $conn;

    private const DSN = "mysql:host=localhost;dbname=dwes";
    private const USER = "byeejasonn";
    private const PASSWD = "1234";
    private const OPTIONS = [
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ];

    private static $instance;

    static function singleton() {
        if (!isset(self::$instance)) {
            $instance = new Conn();
        }

        return $instance;
    }

    private function __construct() {
        try {
            $this->conn = new PDO(self::DSN, self::USER, self::PASSWD, self::OPTIONS);
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }

    function getConn() {
        return $this->conn;
    }

}