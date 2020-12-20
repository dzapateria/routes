<?php
/*
* CONFIGURATION
*/

// Options true @Bool, false @Bool, 'auto' @string
define('ROOT', str_replace('\\', '/', getcwd().'/'));
define('DEV', dev('true'));
// DEFINE YOU FOLDER STRUCTURE
const WEB_ROOT = '/';
const FILES = WEB_ROOT.'files/';
const CSS = WEB_ROOT.'css/';
const JS = WEB_ROOT.'js/';

 // For filesystem functions or include/requires
const PARTIALS = ROOT . 'partials/';
const PAGES = ROOT . 'pages/';

// DEFINE YOU DEFAULT PAGE
const HOME = 'home';
