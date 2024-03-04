<?php

namespace src\Controller;

include_once('Classes/Product.php');
include_once('db/DatabaseConnection.php');

use src\Classes\Product;
use src\db\DatabaseConnection;
use PDO;
use PDOException;

class ProductController
{
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
                    $product = new Product($row['id'], $row['codigo'], $row['nombre'], $row['precio']);
                    $products[] = $product;
                }
            }
        } catch (PDOException $error) {
            echo "Error al obtener los productos: " . $error->getMessage();
        }
        return $products;
    }

    public function addProduct(Product $product)
    {
        $databaseConnection = DatabaseConnection::getInstance();
        $conn = $databaseConnection->getConnection();
        $sql = "INSERT INTO productos (codigo, nombre, precio) VALUES (:codigo, :nombre, :precio)";
        try {
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':codigo', $product->getCodigo());
            $stmt->bindParam(':nombre', $product->getNombre());
            $stmt->bindParam(':precio', $product->getPrecio());
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
        $sql = "UPDATE productos SET codigo = :codigo, nombre = :nombre, precio = :precio WHERE id = :id";
        try {
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':codigo', $product->getCodigo());
            $stmt->bindParam(':nombre', $product->getNombre());
            $stmt->bindParam(':precio', $product->getPrecio());
            $stmt->bindParam(':id', $product->getId());
            $stmt->execute();
            return true;
        } catch (PDOException $error) {
            echo "Error al actualizar el producto: " . $error->getMessage();
            return false;
        }
    }
}
