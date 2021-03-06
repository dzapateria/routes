<?php

/* Version: 0.1 */

require 'routes_config.php';
require 'files.php';

function uri($valor = false)
{
    if (!isset($_GET['url'])) return false;

    $url = $_GET['url'];
    if (strlen($url) == '/') return false;

// Return for String
    $url = strtolower($_GET['url']);
    //  END WITH '/' ALWAYS FOR CONSISTENCE
    $url_slash = (substr($url, -1) === '/') ? $url : $url . '/';

    if (!$valor) return $url_slash;

    // For array Continue --------
    $clean_uri = preg_replace("/\/{2,}/", "/", $url_slash);
    $array_uri = explode('/', $clean_uri);

// Clean empty spaces
    $clean = [];
    foreach ($array_uri as $item) {
        if (strlen($item) > 0 and $item != '') {
            $clean[] = $item;
        }
    }
    return $clean;
}

function dev($opt)
{

    define('DEV_MODE', $opt);
    if ($opt == 'true' or true) return true;
    if ($opt == 'false' or false) return false;

    if ($opt === 'auto') {
        if (PHP_OS == 'WINNT') {
            $env = true;
        } else {
            $env = false;
        }
    }
    return $env;
}


/* Si existe la vista en el directorio lo carga */

function get_partial($name, $src = PARTIALS)
{
    $fullpath = PARTIALS . "$name.php";
    return $fullpath;
}

function get_content($pos = 0, $src = PAGES)
{

    // If value in pos URI Save in page, else value of HOME
    $page = uri() ? uri(true)[$pos] : HOME;

    // Fullpath
    $fullpath = "$src$page.php";
    $error = $src . "404.php";

    // Test if the page exist

    if (file_exists($fullpath)) {
        return $fullpath;
    } else {
        http_response_code(404);
        if (DEV) echo "<script>console.log('No se encontra la página $fullpath')</script>";
        return $error;
    }

}


function get_pagename($pos = 0)
{
    $page = uri() ? uri(true)[$pos] : HOME;
    return $page;
}


$uri = uri();
$uri_array = uri(true);




