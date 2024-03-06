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
        case 'mesas':
            if (empty($url[2])) {
                include_once('./View/tables/Table.php');
                break;
            }
            switch ($url[2]) {
                case 'add':
                    include_once('./View/tables/AddTable.php');
                    break;
                case 'edit':
                    include_once('./View/tables/EditTable.php');
                    break;
                case 'delete':
                    include_once('./View/tables/DeleteTable.php');
                    break;
                case 'mesa':
                    include_once('./View/tables/TableView.php');
                    break;
                default:
                    include_once('./View/404.php');
                    break;
            }
            break;
        case 'tickets':
            if (empty($url[2])) {
                include_once('./View/404.php');
                break;
            }
            switch ($url[2]) {
                case 'add':
                    include_once('./View/tickets/AddTicket.php');
                    break;
                case 'delete':
                    include_once('./View/tickets/DeleteTicket.php');
                    break;
                default:
                    include_once('./View/404.php');
                    break;
            }
            break;
        default:
            include_once('./View/404.php');
            break;
    }
}
