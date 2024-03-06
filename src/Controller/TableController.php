<?php

namespace src\Controller;

include_once('Model/Product.php');
include_once('db/DatabaseConnection.php');

use src\Model\Table;
use src\db\DatabaseConnection;
use PDO;
use PDOException;

class TableController{

    public function getAllTables(){
        $tables = array();
        $databaseConnection = DatabaseConnection::getInstance();
        $conn = $databaseConnection->getConnection();
        $sql = "SELECT * FROM mesas";
        try {
            $result = $conn->query($sql);
            if ($result->rowCount() > 0) {
                while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                    $table = new Table($row['estado']);
                    $table->setNumero($row['numero']);
                    $tables[] = $table;
                }
            }
        } catch (PDOException $error) {
            echo "Error al obtener las mesas: " . $error->getMessage();
        }
        return $tables;
    }

    public function getTableByNumber($numero){
        $table = null;
        $databaseConnection = DatabaseConnection::getInstance();
        $conn = $databaseConnection->getConnection();
        $sql = "SELECT * FROM mesas WHERE numero = :numero";
        try {
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':numero', $numero, PDO::PARAM_INT);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($row) {
                $table = new Table($row['estado']);
                $table->setNumero($row['numero']);
            }
        } catch (PDOException $error) {
            echo "Error al obtener la mesa: " . $error->getMessage();
        }
        return $table;
    }

    public function updateTable($table){
        $databaseConnection = DatabaseConnection::getInstance();
        $conn = $databaseConnection->getConnection();
        $sql = "UPDATE mesas SET estado = :estado WHERE numero = :numero";
        try {
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':estado', $table->getEstado(), PDO::PARAM_STR);
            $stmt->bindParam(':numero', $table->getNumero(), PDO::PARAM_INT);
            $stmt->execute();
            return 1;
        } catch (PDOException $error) {
            echo "Error al actualizar la mesa: " . $error->getMessage();
            return 0;
        }
    }

    public function deleteTable($numero){
        $databaseConnection = DatabaseConnection::getInstance();
        $conn = $databaseConnection->getConnection();
        $sql = "DELETE FROM mesas WHERE numero = :numero";
        try {
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':numero', $numero, PDO::PARAM_INT);
            $stmt->execute();
            return 1;
        } catch (PDOException $error) {
            echo "Error al eliminar la mesa: " . $error->getMessage();
            return 0;
        }
    }
}