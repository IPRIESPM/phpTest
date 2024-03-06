<?php

namespace src;

$url = $_SERVER['REQUEST_URI'];
$url = explode('/', $url);
$url = array_filter($url);
$url = array_values($url);


if (empty($url)) {
    include_once('./View/Home.php');
} else {
    if ($url[0] == 'productos') {
        include_once('./View/Product.php');
    } else {
        echo "404";
    }
}
