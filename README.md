## Routes by dzapateria

### DETAILS

- Give a ROOT constant for cross system OS paths
- Give a WEBROOT for define you structure in all links.
- Front controller with use friendly urls and also GET parameters.

## index.php
Fix path OS diferences with Windows (a\b\c) vs Linux (a/b/c) when use \_\_DIR\_\_ 
with this now have a ROOT constant with ROOT real ap directory CrossOS. 
```
define('ROOT', str_replace('\\', '/', __DIR__.'/'));
```
Load the library

``` 
require 'libs/routes.php';
```

Always usage the constant before names of pages or files in HTML
``` 
<a href="<?= WEBROOT ?>">Home</a>
<a href="<?= WEBROOT ?>servicios/">Servicios</a>

<img src="<?= FILES ?>200.jpg" alt="">
```

## Configuration

- Why load partials with own functions instead of includes?

This is good for intermediate in absolute source of file, is better can add in the own inc() function a preceded directory than search and remplace many files of you project. 
Also we can test if the file path exist and change the route if not exist.
### .htaccess (Only for subdirectory usage)

``` 
# app is the name of you app directory
RewriteCond %{REQUEST_URI} app
RewriteRule ^(.*)$ /app/?url=$1 [QSA]
```

routes_config.php configuration you folder structure 
``` 

// Options true @Bool, false @Bool, 'auto' @string
const MODE = 'auto';

// DEFINE YOU WEB FOLDER STRUCTURE (For href/src web links)
const WEB_ROOT = '/';
const FILES = WEB_ROOT.'files/';
const CSS = WEB_ROOT.'css/';
const JS = WEB_ROOT.'js/';

 // For filesystem functions or include/requires
const PARTIALS = ROOT . 'partials/';
const PAGES = ROOT . 'pages/';

// DEFINE YOU DEFAULT PAGE
const HOME = 'home';

```


- href and src html tag need this directory first (const WEBROOT='/app/')


## routes_config.php file

``` 
const WEBROOT = '/app/
```

# The HTACCESS and routes Testing.

- In cpanel Hosting Domain & Subdomains all is correct.
- In Plesk Domain & Subdomain all is correct.
