<?php

namespace src;

$url = $_SERVER['REQUEST_URI'];
$url = explode('/', $url);
$url = array_values($url);

if (empty($url[1])) {
    include_once('./View/Home.php');
} else {
    switch (trim($url[1])) {
        case 'productos':
            if (empty($url[2])) {
                include_once('./View/products/Product.php');
                break;
            }
            switch ($url[2]) {
                case 'add':
                    include_once('./View/products/AddProduct.php');
                    break;
                case 'edit':
                    include_once('./View/products/EditProduct.php');
                    break;
                case 'delete':
                    include_once('./View/products/DeleteProduct.php');
                    break;
                default:
                    include_once('./View/404.php');
                    break;
            }
            break;
        case 'tables':
            echo "tables";
            break;
        default:
            include_once('./View/404.php');
            break;
    }
}
