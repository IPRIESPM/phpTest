<?php

namespace src\View;

include_once('components/HeaderComponent.php');
include_once('Controller/ProductController.php');

use src\Controller\ProductController;

$productController = new ProductController();
$products = $productController->getAllProducts();
?>
<!DOCTYPE html>
<html lang="en">

<?php HeaderComponent("home"); ?>

<body>

    <div class="tui-screen-800-600 bordered tui-bg-blue-black">

        <!-- Sidenav -->
        <nav class="tui-sidenav absolute">
            <ul>
                <li>
                    <a href="#!">
                        <span class="red-168-text">O</span>pen
                        <span class="tui-shortcut">ctrl+o</span>
                    </a>
                </li>
                <li>
                    <a href="#!">OS Shell</a>
                </li>
                <li>
                    <a href="#!">
                        <span class="red-168-text">C</span>opy
                        <span class="tui-shortcut">ctrl+c</span>
                    </a>
                </li>
                <li>
                    <a href="#!">
                        <span class="red-168-text">P</span>aste
                        <span class="tui-shortcut">ctrl+v</span>
                    </a>
                </li>
                <li>
                    <a href="#!">C<span class="red-168-text">u</span>t
                        <span class="tui-shortcut">ctrl+x</span>
                    </a>
                </li>
                <div class="tui-black-divider"></div>
                <li>
                    <a href="#!">Insert</a>
                </li>
                <li>
                    <a href="#!">Delete</a>
                </li>
                <li>
                    <a href="#!">Go...</a>
                </li>
                <div class="tui-black-divider"></div>
                <li>
                    <a href="#!">
                        <span class="red-168-text">S</span>earch
                        <span class="tui-shortcut">ctrl+p</span>
                    </a>
                </li>
                <div class="tui-black-divider"></div>
                <li>
                    <a href="#!">Exit <span class="tui-shortcut">F10</span></a>
                </li>
            </ul>
        </nav>

        <!-- Navbar -->
        <nav class="tui-nav absolute">
            <span class="tui-datetime" data-format="h:m:s a"></span>
            <ul>
                <li class="tui-sidenav-button red-168-text">≡</li>
                <li class="tui-dropdown">
                    <span class="red-168-text">P</span>roductos
                    <div class="tui-dropdown-content">
                        <ul>
                            <li>
                                <a href="/productos">
                                    <span class="red-168-text">V</span>er
                                    <span class="tui-shortcut">F3</span>
                                </a>
                            </li>
                            <li>
                                <a href="#!">
                                    <span class="red-168-text">C</span>rear
                                    <span class="tui-shortcut">F2</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="tui-dropdown">
                    <span class="red-168-text">M</span>esas
                    <div class="tui-dropdown-content">
                        <ul>
                            <li>
                                <a href="#!">
                                    <span class="red-168-text">V</span>er
                                    <span class="tui-shortcut">F3</span>
                                </a>
                            </li>
                            <li>
                                <a href="#!">
                                    <span class="red-168-text">C</span>rear
                                    <span class="tui-shortcut">F2</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </nav>

        <!-- Edit panel -->
        <div class="tui-window full-width tui-no-shadow" style="margin-top: 20px;">
            <fieldset class="tui-fieldset" style="height: 545px;">
                <legend class="">&nbsp;&nbsp; Home.php</legend>
                <span class="tui-fieldset-button"><span class="green-255-text">↕</span></span>
                <span class="tui-fieldset-button left"><span class="green-255-text">■</span></span>
                <span class="tui-fieldset-text top right" style="margin-right: 50px">1</span>
                <span class="tui-fieldset-text" style="margin-left: 50px;">&nbsp;Text Format: UTF-8&nbsp;</span>

                <fieldset class="tui-fieldset">
                    <legend class="center">Productos</legend>
                    <table class="tui-table striped-purple" style="width: 700px">
                        <thead>
                            <tr>
                                <th>Código</th>
                                <th>Nombre</th>
                                <th>Precio</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($products as $product) : ?>
                                <tr>
                                    <td><?php echo $product->getId(); ?></td>
                                    <td><?php echo $product->getNombre(); ?></td>
                                    <td><?php echo $product->getPrecio() . "€"; ?></td>
                                </tr>
                            <?php endforeach; ?>

                            <?php if (empty($products)) : ?>
                                <tr>
                                    <td colspan="3" style="text-align: center;">No hay productos</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </fieldset>
                <fieldset class="tui-fieldset">
                    <legend class="center">Crear Producto</legend>
                    <form action="/productos" method="POST">
                        <div class="tui-form-group">
                            <label for="nombre">Nombre.......:</label>
                            <input class="tui-input" type="text" name="nombre" id="nombre" required>
                        </div>
                        <div class="tui-form-group">
                            <label for="precio">Precio.......:</label>
                            <input class="tui-input" type="number" value="25" /><br>
                        </div>
                        <button type="submit" class="tui-button tui-bg-green-255">
                            <span class="yellow-255-text">C</span>rear
                        </button>

                </fieldset>
                <fieldset class="tui-fieldset">
                    <legend class="center">Modificar Producto</legend>
                    <form action="/productos" method="POST">
                        <div class="tui-form-group">
                            <label for="nombre">Nombre.......:</label>
                            <input class="tui-input" type="text" name="nombre" id="nombre" value="Coca-Cola" required>
                        </div>
                        <div class="tui-form-group">
                            <label for="precio">Precio.......:</label>
                            <input class="tui-input" type="number" value="2.00" /><br>
                        </div>
                        <button type="submit" class="tui-button tui-bg-green-255">
                            <span class="yellow-255-text">M</span>odificar
                        </button>

                </fieldset>

        </div>

        <!-- Status bar -->
        <div class="tui-statusbar absolute">
            <ul>
                <li><a href="#!"><span class="red-168-text">F1</span> Ayuda</a></li>
                <li><a href="#!"><span class="red-168-text">F2</span> Guardar</a></li>
                <li><a href="#!"><span class="red-168-text">F3</span> Abrir</a></li>
                <li><a href="#!"><span class="red-168-text">Alt+F9</span> Compilar</a></li>
                <span class="tui-statusbar-divider"></span>
                <li><a href="#!"><span class="red-168-text">F10</span> Menu</a></li>
            </ul>
        </div>

    </div>

</body>

</html>