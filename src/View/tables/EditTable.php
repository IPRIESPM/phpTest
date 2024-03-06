<?php

namespace src\View\tables;

use src\Model\Table;
use src\Controller\TableController;

include_once('components/HeaderComponent.php');
include_once('components/ScreenComponent.php');
include_once('Model/Table.php');
include_once('Controller/TableController.php');

if (!isset($_GET['id'])) {
    header('Location: /mesas');
} else {
    $tableController = new TableController();
    $table = $tableController->getTableByNumber($_GET['id']);
}

HeaderComponent("Editar Mesa");
ScreenComponent("EditarMesa");

if (isset($_POST['numero']) && isset($_POST['estado'])) {

    $numero = $_POST['numero'];
    $estado = $_POST['estado'];

    $table = new Table($numero, $estado);

    if ($numero == null || $estado == null) {
        $response = 0;
    } else {

        $tableController = new TableController();
        $response = $tableController->updateTable($table);
    }
    if ($response == 1) {
        echo "<div id='modal' class=''>
       <div class='tui-window red-168'>
           <fieldset class='tui-fieldset'>
               <legend class='red-255 yellow-255-text'> Info </legend>
               Mesa Actualizado, correctamente.
                <a href='/mesas'>
                </br>
               <button class='tui-button ' style='margin:12px;' data-modal='modal'>Volver</button>
               </a>
           </fieldset>
       </div>
   </div>";
    } else {
        echo "<div id='modal' class=''>
        <div class='tui-window red-168'>
            <fieldset class='tui-fieldset'>
                <legend class='red-255 yellow-255-text'>Alert</legend>
                No se ha podido actualizar el producto.
                <a href='/mesas'>
                </br>
               <button class='tui-button ' style='margin:12px;' data-modal='modal'>Volver</button>
               </a>
            </fieldset>
        </div>
    </div>";
    }
}
?>

<form action="/mesas/edit/?id=<?= $table->getNumero() ?>" method="post">
    <span class="yellow-255-text">N</span>umero.....:
    <input style="width: 100px" class="tui-input" name="numero" type="number" value="<?= $table->getNumero() ?>" disabled /><br>
    <input type="hidden" name="numero" value="<?= $table->getNumero() ?>" />
    <br>
    <span class="yellow-255-text">E</span>stado......:
    <select class="tui-input" name="estado">
        <option value="LIBRE">Libre</option>
        <option value="OCUPADA">Ocupada</option>
    </select>
    <br>
    <button class="tui-button" style="margin-top: 8px;" type="submit"><span class="yellow-255-text">E</span>ditar</button>
</form>

<?php StatusBarComponent() ?>