<?php

namespace src\View\tables;

use src\Controller\TicketController;

include_once('Controller/TicketController.php');
include_once('components/HeaderComponent.php');
include_once('components/ScreenComponent.php');


if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $ticketController = new TicketController();
    $tickets = $ticketController->getTicketsByTable($id);
} else {
    header('Location: /mesas');
}
?>

<?php HeaderComponent("Tickets"); ?>
<?php ScreenComponent("Tickets"); ?>

<div class="tui-window" style="text-align: left;">

    <fieldset class="tui-fieldset">
        <legend>
            Tickets mesa <?= $_GET['id'] ?>
        </legend>
        <a style="margin-bottom:16px;" href="/tickets/add/?id=<?= $_GET['id'] ?>" class="tui-button tui-button--primary">Agregar</a>
        <table class="tui-table striped-purple" style="width: 700px">

            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($tickets as $ticket) : ?>
                    <tr>
                        <td><?= $ticket->getProducto()->getNombre() ?></td>
                        <td><?= $ticket->getCantidad() ?></td>
                        <td>
                            <a href="/tickets/delete/?id=<?= $ticket->getId() ?>&table=<?= $id ?>" class="tui-button tui-button--danger">Eliminar</a>
                        </td>

                    </tr>
                <?php endforeach; ?>

                <?php if (empty($tickets)) : ?>
                    <tr>
                        <td colspan="3" style="text-align: center;">No hay Tickets</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </fieldset>
</div><br>

<?php StatusBarComponent() ?>