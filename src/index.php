<?php
include_once("db.php");


$databaseConnection = DatabaseConnection::getInstance();


$conn = $databaseConnection->getConnection();

$sql = "SELECT * FROM productos";
$result = $databaseConnection->executeQuery($sql);


if ($result->rowCount() > 0) {

    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        echo "Código: " . $row["codigo"] . " - Nombre: " . $row["nombre"] . " - Precio: " . $row["precio"] . "<br>";
    }
} else {
    echo "No se encontraron productos.";
}
