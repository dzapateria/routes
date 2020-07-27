<?php
session_start();
define('DIR', str_replace('\\', '/', __DIR__.'/'));
include DIR . "inc/functions.php";

const DEV = (PHP_OS == 'WINNT') ? true : false;
$uri = uri();
$uri_array = uri(true);

// si no se solicito pagina carga home
$page = $uri ? $uri_array['0'] : 'home';

// Si la pagina no existe carga 404
$pagesrc = file_exists(DIR. "/pages/$page.php") ? DIR. "/pages/$page.php" : "pages/404.php";


?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?=$page?></title>
</head>
<body>

<nav>
    <a href="/">Home</a>
    <a href="/&x=2">x2</a>
    <a href="/services/&x=3">Services</a>
    <a href="/services1/">Services2</a>
</nav>

<!-- Page here -->
<?php include $pagesrc; ?>
<!--end page -->

</body>
</html>