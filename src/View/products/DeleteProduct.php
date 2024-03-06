<?php

namespace src\View\products;

use src\Controller\ProductController;

include_once('components/HeaderComponent.php');
include_once('components/ScreenComponent.php');
include_once('Model/Product.php');
include_once('Controller/ProductController.php');


HeaderComponent("Añadir Producto");
ScreenComponent("NuevoProducto");

if(isset($_GET["id"])){
    $id = $_GET["id"];

    $productController = new ProductController();
    $products = $productController->deleteProduct($id);

    if($products){
        echo "<div id='modal' class=''>
        <div class='tui-window red-168'>
            <fieldset class='tui-fieldset'>
                <legend class='red-255 yellow-255-text'> Info </legend>
                Producto eliminado, correctamente.
                 <a href='/productos'>
                 </br>
                <button class='tui-button tui-modal-close-button right' data-modal='modal'>Volver</button>
                </a>
            </fieldset>
        </div>
    </div>";
    } else{
        echo "<div id='modal' class=''>
        <div class='tui-window red-168'>
            <fieldset class='tui-fieldset'>
                <legend class='red-255 yellow-255-text'>Alert</legend>
                No se ha podido eliminar el producto.
                <a href='/productos'>
                </br>
               <button class='tui-button ' data-modal='modal'>Volver</button>
               </a>
            </fieldset>
        </div>
    </div>";
    }
}
StatusBarComponent()
?>

