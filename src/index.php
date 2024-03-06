<?php

namespace src;

$url = $_SERVER['REQUEST_URI'];
$url = explode('/', $url);
$url = array_filter($url);
$url = array_values($url);

if (empty($url)) {
    include_once('./View/Home.php');
} else {
    switch ($url[0]) {
        case 'productos':
            if (empty($url[1])) {
                include_once('./View/products/Product.php');
                break;
            }
            switch (!empty($url[1])) {
                case 'add':
                    include_once('./View/AddProduct.php');
                    break;
                case 'edit':
                    include_once('./View/EditProduct.php');
                    break;
                case 'delete':
                    include_once('./View/DeleteProduct.php');
                    break;
                default:
                    break;
            }
            break;
        default:
            echo "404";
            break;
    }
}
