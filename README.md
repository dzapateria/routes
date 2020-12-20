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

# Para usarlo en subdominios.

No requiere nada especial funciona igual que en un dominio principal

# Para combinarlo en un sitio con Wordpress.

# Para usarlo en subdirectorios 
Para aplicaciones complejas es conveniente no usar esta opción y crear un subdominio.

1. En routes_config.php constante WEB_ROOT edita el valor / por el valor del subdirectorio.
Es importante que finalice en slash
    ``` 
   const WEB_ROOT = '/app/'; 
   ```
2. En .htacces comenta la RewriteRule de OPCION 1 directory y descomenta la OPCION 2 escribiendo 
tanto en la rewriteCond como en la RewriteRule el nombre del directorio, ejemplo con directorio app:

``` 
 RewriteCond %{REQUEST_URI} app
 RewriteRule ^(.*)$ /app/?url=$1 [QSA]
```

3. Donde colocar el .htaccess
Si va a gestionar multiples aplicaciones puede convenirle tener
el htaccess en la ruta general fuera del subdirectorio app.
En cualquier caso la configuración es la misma y puede configurar multiples
redirecciones con un solo htacces si lo coloca en un nivel superior a las aplicaciones pero
tambien funcionara si se encuentra en la carpeta de la aplicación.