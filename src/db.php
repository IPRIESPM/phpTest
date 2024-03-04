<?php

class DatabaseConnection
{
    private $host = "mysql";
    private $username = "tpv_cafeteria";
    private $password = "tpv_cafeteria";
    private $database = "tpv_cafeteria";
    private $conn;

    private static $instance;

    private function __construct()
    {
        try {

            $this->conn = new PDO("mysql:dbname=$this->database;host=$this->host", $this->username, $this->password);
            // Configuración para manejar errores de PDO
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $error) {
            echo "Error de conexión: " . $error->getMessage();
        }
    }

    public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function getConnection()
    {
        return $this->conn;
    }

    public function executeQuery($sql)
    {
        return $this->conn->query($sql);
    }
}
