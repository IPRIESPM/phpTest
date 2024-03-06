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
    if($nombre == null || $precio == null){
        $response = 0;
    } else{
        $producto = new Product($nombre, $precio);
        $producto->setNombre($nombre);
        $producto->setPrecio($precio);

        $productoController = new ProductController();
        $response = $productoController->addProduct($producto);
    }
    if($response == 1){
       echo "<div id='modal' class=''>
       <div class='tui-window red-168'>
           <fieldset class='tui-fieldset'>
               <legend class='red-255 yellow-255-text'> Info </legend>
               Producto Creado, correctamente.
                <a href='/productos'>
                </br>
               <button class='tui-button' style='margin:12px;' data-modal='modal'>Volver</button>
               </a>
           </fieldset>
       </div>
   </div>";
    } else{
        echo "<div id='modal' class=''>
        <div class='tui-window red-168'>
            <fieldset class='tui-fieldset'>
                <legend class='red-255 yellow-255-text'>Alert</legend>
                No se ha podido crear el producto.
                <a href='/productos'>
                </br>
               <button class='tui-button' style='margin:12px;' data-modal='modal'>Volver</button>
               </a>
            </fieldset>
        </div>
    </div>";
    }}
?>

<form action="./add" method="post">
    <span class="yellow-255-text">N</span>ombre.....:
    <input style="width: 100px" class="tui-input" name="nombre"  type="text" require/>
    <br>
    <span class="yellow-255-text">P</span>recio.....:
    <input style="width: 100px" class="tui-input" name="precio" type="number" require /><br>
    <button class="tui-button" style="margin-top: 8px;" type="submit"><span class="yellow-255-text">C</span>rear</button>
</form>

<?php StatusBarComponent() ?>

