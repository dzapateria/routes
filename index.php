<?php
session_start();
/**
 * DIR save the root of project absolute os format for includes or filesystem work
 * We can move a file or page and all access of filesystem no break for is absolute real sources
 * Cross OS is the change of LETTER:\folder1\folder2 in WINDOWS for LETTER:/folder1/folder2 CROSS OS
*/

    define('DIR', str_replace('\\', '/', __DIR__.'/'));
    require DIR.'/libs/routes.php';

    // Helper for development or production env
         //  const DEV = (PHP_OS == 'WINNT') ? true : false
    /* Forded dev true */
    const DEV = false;

    // Use lib routes
    $uri = uri();
    $uri_array = uri(true);
    // si no se solicito pagina carga home
    $page = $uri ? $uri_array['0'] : 'home';
    // Config page load and 404 Page
    $pagesrc = file_exists(DIR. "/pages/$page.php") ? DIR. "/pages/$page.php" : "pages/404.php";


?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="styles.css?v=<?=DEV?time():date("d.m.y")?>">
    <title><?=$page?></title>
</head>
<body>

<nav>
    <a href="/">Home</a>
    <a href="/about/">about</a>
    <a href="/services/&x=3">Services</a>
    <a href="/no-exist/">error</a>
</nav>

<!-- Page here -->
<?php include $pagesrc; ?>
<!--end page -->


<!-- debug helpers outputs -->
<?php if(DEV) include DIR . '/libs/info.php'; ?>

</body>
</html>