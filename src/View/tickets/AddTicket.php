<?php

namespace src\View\tables;

use src\Model\Ticket;
use src\Controller\TicketController;

use src\Model\Product;
use src\Controller\ProductController;

use src\Controller\TableController;

include_once('components/HeaderComponent.php');
include_once('components/ScreenComponent.php');

include_once('Model/Ticket.php');
include_once('Controller/TicketController.php');

include_once('Model/Product.php');
include_once('Controller/ProductController.php');

include_once('Controller/TableController.php');


HeaderComponent("Añadir Ticket");
ScreenComponent("AñadirTicket");

if (!isset($_GET['id'])) {
    header('Location: /mesas');
} else {
    $mesaId = $_GET['id'];
}

if (isset($_POST['product']) && isset($_POST['cantidad'])) {

    $productId = $_POST['product'];
    $cantidad = $_POST['cantidad'];

    if ($productId == null || $cantidad == null) {
        $response = 0;
    } else {
        $ticketController = new TicketController();
        $response = $ticketController->addTicket($mesaId, $productId, $cantidad);

        $tableController = new TableController();
        $tableController->changeTableStatus($mesaId, "Ocupada");
    }
    if ($response == 1) {
        echo "<div id='modal' class=''>
       <div class='tui-window red-168'>
           <fieldset class='tui-fieldset'>
               <legend class='red-255 yellow-255-text'> Info </legend>
               Ticket creada correctamente.
                <a href='/mesas/mesa/?id=" . $mesaId . "'>
                </br>
               <button class='tui-button' style='margin:12px;' data-modal='modal'>Volver</button>
               </a>
           </fieldset>
       </div>
   </div>";
        return;
    } else {
        echo "<div id='modal' class=''>
        <div class='tui-window red-168'>
            <fieldset class='tui-fieldset'>
                <legend class='red-255 yellow-255-text'>Alert</legend>
               No se ha podido crear el ticket.
               <a href='/mesas/mesa/?id=" . $mesaId . "'>
                </br>
               <button class='tui-button' style='margin:12px;' data-modal='modal'>Volver</button>
               </a>
            </fieldset>
        </div>
    </div>";
        return;
    }
} else {
    $productController = new ProductController();
    $products = $productController->getAllProducts();
}
?>

<form action="/tickets/add/?id= <?= $mesaId ?> " method="post">

    <span class="yellow-255-text">P</span>roducto......:
    <select class="tui-input" name="product" required>
        <?php
        if (empty($products)) {
            echo "<option value=''>No hay productos</option>";
        }
        foreach ($products as $product) {
            echo "<option value='" . $product->getId() . "'>" . $product->getNombre() . "</option>";
        }

        ?>
    </select>
    <br>
    <span class="yellow-255-text">C</span>antidad......:
    <input style="width: 100px" class="tui-input" name="cantidad" type="number" required /><br>
    <button class="tui-button" style="margin-top: 8px;" type="submit"><span class="yellow-255-text">C</span>rear</button>
</form>

<?php StatusBarComponent() ?>