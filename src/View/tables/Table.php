<?php

namespace src\View\tables;

use src\Controller\TableController;

include_once('Controller/TableController.php');
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
                    <td><?php echo $table->getEstado(); ?></td>
                    <td style="padding-left:8px;">
                        <a href="/mesas/edit/?id=<?= $table->getNumero() ?>">
                            <button class="tui-button">Editar</button>
                        </a>
                        <a href="/mesas/delete/?id=<?= $table->getNumero() ?>">
                            <button class="tui-button">Eliminar</button>
                        </a>
                        <a href="/mesas/mesa/?id=<?= $table->getNumero() ?>">
                            <button class="tui-button">Ver</button>
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>

            <?php if (empty($tables)) : ?>
                <tr>
                    <td colspan="3" style="text-align: center;">No hay Mesas</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div><br>

<?php StatusBarComponent() ?>