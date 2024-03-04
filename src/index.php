<?php

include_once('Controller/ProductController.php');

use src\Controller\ProductController;

$productController = new ProductController();
$products = $productController->getAllProducts();

?>

<!DOCTYPE html>
<html lang="en" class="tui-bg-blue-black">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/TuiCss/tuicss.css">
    <script src="./css/TuiCss/tuicss.js"></script>
    <title>tpv_cafeteria</title>
    <style>
        .tui-window {
            margin-bottom: 40px;
        }
    </style>
</head>

<body>

    <body class="center" style="padding: 50px">

        <div class="tui-window" style="text-align: left;">
            <fieldset class="tui-fieldset">
                <legend class="center">Productos</legend>
                <table class="tui-table striped-purple" style="width: 700px">
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Nombre</th>
                            <th>Precio</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($products as $product) : ?>
                            <tr>
                                <td><?php echo $product->getId(); ?></td>
                                <td><?php echo $product->getNombre(); ?></td>
                                <td><?php echo $product->getPrecio() . "€"; ?></td>
                            </tr>
                        <?php endforeach; ?>

                        <?php if (empty($products)) : ?>
                            <tr>
                                <td colspan="3" style="text-align: center;">No hay productos</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </fieldset>
        </div><br>



</html>