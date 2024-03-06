<?php

namespace src\View\products;

use src\Model\Product;
use src\Controller\ProductController;

include_once('components/HeaderComponent.php');
include_once('components/ScreenComponent.php');
include_once('Model/Product.php');
include_once('Controller/ProductController.php');


HeaderComponent("Añadir Producto");
ScreenComponent("NuevoProducto");

if(isset($_POST['nombre']) && isset($_POST['precio'])){
    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];
    $producto = new Product($nombre, $precio);
    $producto->setNombre($nombre);
    $producto->setPrecio($precio);

    $productoController = new ProductController();
    $response = $productoController->addProduct($producto);
    echo $response;
    if($response == 1){
       echo "<div id='modal' class=''>
       <div class='tui-window red-168'>
           <fieldset class='tui-fieldset'>
               <legend class='red-255 yellow-255-text'>Alert</legend>
               ...
               <button class='tui-button tui-modal-close-button right' data-modal='modal'>close</button>
           </fieldset>
       </div>
   </div>";
    } else{
        echo "<div id='modal' class=''>
        <div class='tui-window red-168'>
            <fieldset class='tui-fieldset'>
                <legend class='red-255 yellow-255-text'>Alert</legend>
                Error
                <button class='tui-button tui-modal-close-button right' data-modal='modal'>close</button>
            </fieldset>
        </div>
    </div>";
    }}
?>

<form action="./add" method="post">
    <span class="yellow-255-text">N</span>ombre.....:
    <input style="width: 100px" class="tui-input" name="nombre"  type="text" />
    <br>
    <span class="yellow-255-text">P</span>recio.....:
    <input style="width: 100px" class="tui-input" name="precio" type="number" value="106" /><br>
    <button class="tui-button" style="margin-top: 8px;" type="submit"><span class="yellow-255-text">C</span>rear</button>
</form>
