<?php

namespace src\View\tickets;

use src\Controller\TicketController;
use src\Controller\TableController;

include_once('components/HeaderComponent.php');
include_once('components/ScreenComponent.php');

include_once('Model/Table.php');

include_once('Controller/TicketController.php');
include_once('Controller/TableController.php');



HeaderComponent("Eliminar Ticket");
ScreenComponent("Eliminar Ticket");

if (isset($_GET["id"]) && isset($_GET["table"])) {
    $id = $_GET["id"];

    $ticketController = new TicketController();
    $response = $ticketController->deleteTicket($id);

    if ($response) {
        $tickets = $ticketController->getTicketsByTable($_GET["table"]);
        if (count($tickets) == 0) {
            $tableController = new TableController();
            $table = $tableController->getTableByNumber($_GET["table"]);
            $table->setEstado("Libre");
            $tableController->updateTable($table);
        }
        echo "<div id='modal' class=''>
        <div class='tui-window red-168'>
            <fieldset class='tui-fieldset'>
                <legend class='red-255 yellow-255-text'> Info </legend>
                Ticket eliminad0, correctamente.
                 <a href='/mesas'>
                 </br>
                <button class='tui-button tui-modal-close-button' >Volver</button>
                </a>
            </fieldset>
        </div>
    </div>";
    } else {
        echo "<div id='modal' class=''>
        <div class='tui-window red-168'>
            <fieldset class='tui-fieldset'>
                <legend class='red-255 yellow-255-text'>Alert</legend>
                No se ha podido eliminar el Ticket.
                <a href='/mesas'>
                </br>
               <button class='tui-button ' data-modal='modal'>Volver</button>
               </a>
            </fieldset>
        </div>
    </div>";
    }
}
StatusBarComponent();
