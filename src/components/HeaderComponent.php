<?php
function HeaderComponent(string $title)
{

    echo "<!DOCTYPE html>
    <html lang='en' class='tui-bg-blue-black  no-tui-scroll'>
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <link rel='stylesheet' href='/css/TuiCss/tuicss.css'>
        <script src='/css/TuiCss/tuicss.js'></script>
        <title>tpv_cafeteria - $title</title>
        <style>
            .tui-window {
                margin-bottom: 40px;
            }
        </style>
    </head>
    <body style='display:grid; place-items:center; height: 100vh'>";
}
