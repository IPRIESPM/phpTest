<?php

namespace src\View\tables;

use src\Model\Table;
use src\Controller\TableController;

include_once('components/HeaderComponent.php');
include_once('components/ScreenComponent.php');
include_once('Model/Table.php');
include_once('Controller/TableController.php');


HeaderComponent("Añadir Mesa");
ScreenComponent("NuevaMesa");

if (isset($_POST['nueva'])) {

    $numero = $_POST['numero'];
    if ($numero == null) {
        $response = 0;
    } else {
        $mesa = new Table($numero);
        $tableController = new TableController();
        $response = $tableController->addTable($mesa);
    }
    if ($response == 1) {
        echo "<div id='modal' class=''>
       <div class='tui-window red-168'>
           <fieldset class='tui-fieldset'>
               <legend class='red-255 yellow-255-text'> Info </legend>
               Mesa creada correctamente.
                <a href='/mesas'>
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
               No se ha podido crear la mesa.
                <a href='/mesas'>
                </br>
               <button class='tui-button' style='margin:12px;' data-modal='modal'>Volver</button>
               </a>
            </fieldset>
        </div>
    </div>";
        return;
    }
}
?>

<form action="/mesas/add" method="post">
    <input type="hidden" name="nueva" value="true" />
    <span class="yellow-255-text">N</span>úmero.....:
    <input style="width: 100px" class="tui-input" name="numero" type="number" required /><br>
    <button class="tui-button" style="margin-top: 8px;" type="submit"><span class="yellow-255-text">C</span>rear</button>
</form>

<?php StatusBarComponent() ?>