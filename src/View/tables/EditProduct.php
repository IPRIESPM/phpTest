<?php

namespace src\View\products;

use src\Model\Product;
use src\Controller\ProductController;

include_once('components/HeaderComponent.php');
include_once('components/ScreenComponent.php');
include_once('Model/Product.php');
include_once('Controller/ProductController.php');

if (!isset($_GET['id'])) {
    header('Location: /productos');
} else {
    $productoController = new ProductController();
    $producto = $productoController->getProductById($_GET['id']);
}

HeaderComponent("Editar Producto");
ScreenComponent("EditarProducto");

if(isset($_POST['nombre']) && isset($_POST['precio'])){

    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];

    $producto = new Product($nombre, $precio);
    $producto->setId($_GET['id']);

    if($nombre == null || $precio == null){
        $response = 0;
    } else{

        $productoController = new ProductController();
        $response = $productoController->updateProduct($producto);
    }
    if($response == 1){
       echo "<div id='modal' class=''>
       <div class='tui-window red-168'>
           <fieldset class='tui-fieldset'>
               <legend class='red-255 yellow-255-text'> Info </legend>
               Producto Actualizado, correctamente.
                <a href='/productos'>
                </br>
               <button class='tui-button ' style='margin:12px;' data-modal='modal'>Volver</button>
               </a>
           </fieldset>
       </div>
   </div>";
    } else{
        echo "<div id='modal' class=''>
        <div class='tui-window red-168'>
            <fieldset class='tui-fieldset'>
                <legend class='red-255 yellow-255-text'>Alert</legend>
                No se ha podido actualizar el producto.
                <a href='/productos'>
                </br>
               <button class='tui-button ' style='margin:12px;' data-modal='modal'>Volver</button>
               </a>
            </fieldset>
        </div>
    </div>";
    }}
?>

<form action="/productos/edit/?id=<?= $producto->getId() ?>" method="post">
    <span class="yellow-255-text">N</span>ombre.....:
    <input style="width: 100px" class="tui-input" name="nombre" value="<?= $producto->getNombre() ?>"  type="text" require/>
    <br>
    <span class="yellow-255-text">P</span>recio.....:
    <input style="width: 100px" class="tui-input" name="precio" type="number" value="<?= $producto->getPrecio() ?>" require /><br>
    <button class="tui-button" style="margin-top: 8px;" type="submit"><span class="yellow-255-text">E</span>ditar</button>
</form>

<?php StatusBarComponent() ?>

