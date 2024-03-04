<?php
include_once("db.php");

// Obtener una instancia de la clase DatabaseConnection
$databaseConnection = DatabaseConnection::getInstance();

// Obtener la conexión a la base de datos
$conn = $databaseConnection->getConnection();

// Ejecutar una consulta SQL
$sql = "SELECT * FROM productos";
$result = $databaseConnection->executeQuery($sql);

// Verificar si hay filas en el resultado
if ($result->rowCount() > 0) {
    // Recorrer los resultados
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        echo "Código: " . $row["codigo"] . " - Nombre: " . $row["nombre"] . " - Precio: " . $row["precio"] . "<br>";
    }
} else {
    echo "No se encontraron productos.";
}

// No es necesario desconectar la base de datos cuando se utiliza PDO
