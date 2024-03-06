<?php

namespace src\View\products;
use src\Controller\TableController;

include_once('Controller/ProductController.php');
include_once('components/HeaderComponent.php');
include_once('components/ScreenComponent.php');

$tableController = new TableController();
$tables = $tableController->getAllTables();

?>

<?php HeaderComponent("Mesas"); ?>
<?php ScreenComponent("Mesas"); ?>

<div class="tui-window" style="text-align: left;">
    <table class="tui-table striped-purple" style="width: 700px">
        <thead>
            <tr>
                <th>Número</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tables as $table) : ?>
                <tr>
                    <td><?php echo $table->getNumero(); ?></td>
                    <td><?php echo $table->getEstado() . "€"; ?></td>
                    <td style="padding-left:8px;">
                        <a href="/mesas/edit/?id=<?= $product->getId() ?>">
                            <button class="tui-button">Editar</button>
                        </a>
                        <a href="/mesas/delete/?id=<?= $product->getId() ?>">
                            <button class="tui-button">Eliminar</button>
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>

            <?php if (empty($products)) : ?>
                <tr>
                    <td colspan="3" style="text-align: center;">No hay Mesas</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div><br>

<?php StatusBarComponent() ?>