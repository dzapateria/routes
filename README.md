## Routes by dzapateria

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

##Configuration

### .htaccess (Only for subdirectory usage)

``` 
# app is the name of you app directory
RewriteCond %{REQUEST_URI} app
RewriteRule ^(.*)$ /app/?url=$1 [QSA]
```



- href and src html tag need this directory first (const WEBROOT='/app/')


## routes_config.php file

``` 
const WEBROOT = '/app/
```

