<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?=CSS?>styles.css?v=<?=DEV?time():date("d.m.y")?>">
    <title><?=get_pagename()?></title>
</head>
<body>
<nav>
    <a href="<?=WEB_ROOT?>">Home</a>
    <a href="<?=WEB_ROOT?>about/">about</a>
    <a href="<?=WEB_ROOT?>services/&x=3">Services</a>
    <a href="<?=WEB_ROOT?>no-exist/">error</a>
</nav>