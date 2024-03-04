<?php

include_once('Controller/ProductController.php');

use src\Controller\ProductController;

$productController = new ProductController();
$products = $productController->getAllProducts();

echo "<h1>Productos</h1>";
echo "<table border='1'>";
echo "<tr><th>Código</th><th>Nombre</th><th>Precio</th></tr>";
foreach ($products as $product) {
    echo "<tr>";
    echo "<td>" . $product->getCodigo() . "</td>";
    echo "<td>" . $product->getNombre() . "</td>";
    echo "<td>" . $product->getPrecio() . "</td>";
    echo "</tr>";
}
echo "</table>";
