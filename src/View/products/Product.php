<?php

namespace src\View\products;
use src\Controller\ProductController;

include_once('Controller/ProductController.php');
include_once('components/HeaderComponent.php');
include_once('components/ScreenComponent.php');

$productController = new ProductController();
$products = $productController->getAllProducts();


?>

<?php HeaderComponent("Productos"); ?>
<?php ScreenComponent("Productos"); ?>

<div class="tui-window" style="text-align: left;">
    <table class="tui-table striped-purple" style="width: 700px">
        <thead>
            <tr>
                <th>Código</th>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $product) : ?>
                <tr>
                    <td><?php echo $product->getId(); ?></td>
                    <td><?php echo $product->getNombre(); ?></td>
                    <td><?php echo $product->getPrecio() . "€"; ?></td>
                    <td style="padding-left:8px;">
                        <a href="/productos/edit/?id=<?= $product->getId() ?>">
                            <button class="tui-button">Editar</button>
                        </a>
                        <a href="/productos/delete/?id=<?= $product->getId() ?>">
                            <button class="tui-button">Eliminar</button>
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>

            <?php if (empty($products)) : ?>
                <tr>
                    <td colspan="3" style="text-align: center;">No hay productos</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div><br>

<?php StatusBarComponent() ?>