<?php

namespace src\Controller;

include_once('Model/Product.php');
include_once('db/DatabaseConnection.php');

use src\Model\Product;
use src\db\DatabaseConnection;
use PDO;
use PDOException;

class ProductController{

    public function getAllProducts()
    {
        $products = array();
        $databaseConnection = DatabaseConnection::getInstance();
        $conn = $databaseConnection->getConnection();
        $sql = "SELECT * FROM productos";
        try {
            $result = $conn->query($sql);
            if ($result->rowCount() > 0) {
                while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                    $product = new Product($row['nombre'], $row['precio']);
                    $product->setId($row['id']);
                    $products[] = $product;
                }
            }
        } catch (PDOException $error) {
            echo "Error al obtener los productos: " . $error->getMessage();
        }
        return $products;
    }

    public function getProductById($productId)
    {
        $databaseConnection = DatabaseConnection::getInstance();
        $conn = $databaseConnection->getConnection();
        $sql = "SELECT * FROM productos WHERE id = :id";
        try {
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':id', $productId);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $product = new Product($row['nombre'], $row['precio']);
            $product->setId($row['id']);
            return $product;
        } catch (PDOException $error) {
            echo "Error al obtener el producto: " . $error->getMessage();
        }
    }

    public function addProduct(Product $product)
    {
        $databaseConnection = DatabaseConnection::getInstance();
        $conn = $databaseConnection->getConnection();
        $sql = "INSERT INTO productos ( nombre, precio) VALUES ( :nombre, :precio)";
        try {
            $nombre = $product->getNombre();
            $precio = $product->getPrecio();
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':nombre', $nombre);
            $stmt->bindParam(':precio', $precio);
            $stmt->execute();
            return true;
        } catch (PDOException $error) {
            echo "Error al agregar el producto: " . $error->getMessage();
            return false;
        }
    }

    public function deleteProduct($productId)
    {
        $databaseConnection = DatabaseConnection::getInstance();
        $conn = $databaseConnection->getConnection();
        $sql = "DELETE FROM productos WHERE id = :id";
        try {
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':id', $productId);
            $stmt->execute();
            return true;
        } catch (PDOException $error) {
            echo "Error al eliminar el producto: " . $error->getMessage();
            return false;
        }
    }

    public function updateProduct(Product $product)
    {
        $databaseConnection = DatabaseConnection::getInstance();
        $conn = $databaseConnection->getConnection();
        $sql = "UPDATE productos SET nombre = :nombre, precio = :precio WHERE id = :id";

        $nombre = $product->getNombre();
        $precio = $product->getPrecio();
        $id = $product->getId();

        echo $nombre . " " . $precio . " " . $id;
        try {
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':nombre', $nombre);
            $stmt->bindParam(':precio', $precio);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return true;
        } catch (PDOException $error) {
            echo "Error al actualizar el producto: " . $error->getMessage();
            return false;
        }
    }
}
