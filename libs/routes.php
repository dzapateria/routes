<?php

function uri($valor = false)
{
    if ( !isset($_GET['url'])) return false;

    $url = $_GET['url'];
    if (strlen($url) == '/') return false;

// Return for String
    $url = strtolower($_GET['url']);
    $url_slash = (substr($url, -1) === '/') ? $url : $url . '/';
    //  END WITH '/' ALWAYS FOR CONSISTENCE
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





function uri2($valor = false)
{
    $str = $_SERVER['REQUEST_URI'];
//  END WITH '/' ALWAYS
    $uri_cross = (substr($str, -1) == '/') ? $str : $str . '/';

# CLEAN GET PARAMETERS AND # OF URL
    if (strpos($uri_cross, '?')) {
        $pos_init_get = strpos($uri_cross, '?');
        $width = strlen($uri_cross);
        $width_without_get = $width - $pos_init_get;
        $url_without_get = substr($uri_cross, 0, -$width_without_get);
        $final = strtolower($url_without_get); #  url sin $_GET
    } else {
        $final = strtolower($uri_cross);
    }
    if (strpos($uri_cross, '&')) {
        $pos_init_get = strpos($uri_cross, '&');
        $width = strlen($uri_cross);
        $width_without_get = $width - $pos_init_get;
        $url_without_get = substr($uri_cross, 0, -$width_without_get);
        $final = strtolower($url_without_get); #  url sin $_GET
    }else {
        $final = strtolower($uri_cross);
    }

// Return for String
    if (!$valor) return strtolower($final);
    // For array Continue --------
    $clean_uri = preg_replace("/\/{2,}/", "/", $final);
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


