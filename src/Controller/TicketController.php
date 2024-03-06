<?php

namespace src\Controller;

include_once('Model/Ticket.php');
include_once('db/DatabaseConnection.php');
include_once('Controller/TableController.php');
include_once('Controller/ProductController.php');

use src\Model\Ticket;
use src\Model\Table;
use src\Model\Product;
use src\Controller\ProductController;
use src\Controller\TableController;
use src\db\DatabaseConnection;
use PDO;
use PDOException;

class TicketController
{
    public function getTicketsByTable($id)
    {
        $tickets = [];
        $databaseConnection = DatabaseConnection::getInstance();
        $conn = $databaseConnection->getConnection();
        $sql = "SELECT * FROM consumiciones WHERE numero_mesa = :id";
        try {
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if ($rows) {
                foreach ($rows as $row) {
                    $ticket = new Ticket();
                    $ticket->setId($row['id']);
                    $ticket->setNumeroMesa($row['numero_mesa']);

                    $tableController = new TableController();
                    $mesa = $tableController->getTableByNumber($row['numero_mesa']);
                    $ticket->setMesa($mesa);

                    $ticket->setCodigoProducto($row['codigo_producto']);
                    $productController = new ProductController();
                    $producto = $productController->getProductById($row['codigo_producto']);

                    $ticket->setProducto($producto);
                    $ticket->setCantidad($row['cantidad']);
                    array_push($tickets, $ticket);
                }
            }
        } catch (PDOException $error) {
            echo "Error al obtener los tickets: " . $error->getMessage();
        }
        return $tickets;
    } // getTicketsByTable(


    public function getTicketById($id)
    {
        $ticket = null;
        $databaseConnection = DatabaseConnection::getInstance();
        $conn = $databaseConnection->getConnection();
        $sql = "SELECT * FROM consumiciones WHERE id = :id";
        try {
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($row) {
                $ticket = new Ticket();
                $ticket->setId($row['id']);
                $ticket->setNumeroMesa($row['numero_mesa']);

                $tableController = new TableController();
                $mesa = $tableController->getTableByNumber($row['numero_mesa']);
                $ticket->setMesa($mesa);

                $ticket->setCodigoProducto($row['codigo_producto']);
                $productController = new ProductController();
                $producto = $productController->getProductById($row['codigo_producto']);

                $ticket->setProducto($producto);
                $ticket->setCantidad($row['cantidad']);
            }
        } catch (PDOException $error) {
            echo "Error al obtener el ticket: " . $error->getMessage();
        }
        return $ticket;
    }

    public function addTicket($mesaId, $productId, $cantidad)
    {
        $databaseConnection = DatabaseConnection::getInstance();
        $conn = $databaseConnection->getConnection();
        $sql = "INSERT INTO consumiciones (numero_mesa, codigo_producto, cantidad) VALUES (:mesaId, :productId, :cantidad)";
        try {
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':mesaId', $mesaId, PDO::PARAM_INT);
            $stmt->bindParam(':productId', $productId, PDO::PARAM_INT);
            $stmt->bindParam(':cantidad', $cantidad, PDO::PARAM_INT);
            $stmt->execute();
            return 1;
        } catch (PDOException $error) {
            echo "Error al añadir el ticket: " . $error->getMessage();
            return 0;
        }
    }

    public function deleteTicket($id)
    {
        $databaseConnection = DatabaseConnection::getInstance();
        $conn = $databaseConnection->getConnection();
        $sql = "DELETE FROM consumiciones WHERE id = :id";
        try {
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            return true;
        } catch (PDOException $error) {
            echo "Error al eliminar el ticket: " . $error->getMessage();
            return false;
        }
    }
}
