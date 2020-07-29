<?php
/*
* CONFIGURATION
*/

// Options true @Bool, false @Bool, 'auto' @string
define('DEV', dev('auto'));

// DEFINE YOU FOLDER STRUCTURE
const WEB_ROOT = '/';
const FILES = WEB_ROOT.'files/';

// DEFINE YOU DEFAULT PAGE
$home = 'home';



// Use lib routes
$uri = uri();
$uri_array = uri(true);
// si no se solicito pagina carga home
$page = $uri ? $uri_array['0'] : $home;
// Config page load and 404 Page
$pagesrc = file_exists(ROOT. "/pages/$page.php") ? ROOT. "/pages/$page.php" : "pages/404.php";




