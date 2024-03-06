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
            switch (!empty(trim($url[2]))) {
                case 'add':
                    include_once('./View/products/AddProduct.php');
                    break;
                case 'edit':
                    echo "edit";
                    break;
                case 'delete':
                    echo "delete";
                    break;
                default:
                    echo "404";
                    break;
            }
            break;
        default:
            echo "404";
            break;
    }
}
