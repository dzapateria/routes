<?php


function in($directorio, $ruta = false, $recursivo = false)
{

    // Array en el que obtendremos los resultados
    $res = array();

    // Agregamos la barra invertida al final en caso de que no exista
    if (substr($directorio, -1) != "/") $directorio .= "/";

    // Creamos un puntero al directorio y obtenemos el listado de archivos
    $dir = @dir($directorio) or die("getFileList: Error abriendo el directorio $directorio para leerlo");
    while (($archivo = $dir->read()) !== false) {
        // Obviamos los archivos ocultos
        if ($archivo[0] == ".") continue;
        if (is_dir($directorio . $archivo)) {
            if (!$ruta) $res[] = $directorio . $archivo . "/";
            if ($ruta) $res[] = $archivo;

            if ($recursivo && is_readable($directorio . $archivo . "/")) {
                $directorioInterior = $directorio . $archivo . "/";
                $res[] = array_merge($res, in($directorioInterior, true));

            }
        } else if (is_readable($directorio . $archivo)) {


            if (!$ruta) $res[] = $directorio . $archivo;
            if ($ruta) $res[] = $archivo;
        }
    }
    $dir->close();
    return $res;
}


function makeAll($dir, $mode = 0777, $recursive = true)
{
    if (is_null($dir) || $dir === "") {
        return false;
    }

    if (is_dir($dir) || $dir === "/") {
        return true;
    }
    if (makeAll(dirname($dir), $mode, $recursive)) {
        return mkdir($dir, $mode);
    }
    return false;
}

/**
 * @param $source
 * @param $dest
 * @param int[] $options
 * @return bool|mixed
 *
 * Tiene como dependencia tiene a makeAll()
 *
 */

function smartCopy($source, $dest, $options = array('folderPermission' => 0755, 'filePermission' => 0755))
{
    $result = false;

    //For Cross Platform Compatibility
    if (!isset($options['noTheFirstRun'])) {
        $source = str_replace('\\', '/', $source);
        $dest = str_replace('\\', '/', $dest);
        $options['noTheFirstRun'] = true;
    }

    if (is_file($source)) {
        if ($dest[strlen($dest) - 1] == '/') {
            if (!file_exists($dest)) {
                makeAll($dest, $options['folderPermission'], true);
            }
            $__dest = $dest . "/" . basename($source);
        } else {
            $__dest = $dest;
        }
        if (!file_exists($__dest)) {
            $result = copy($source, $__dest);
            chmod($__dest, $options['filePermission']);
        }
    } elseif (is_dir($source)) {
        if ($dest[strlen($dest) - 1] == '/') {
            if ($source[strlen($source) - 1] == '/') {
                //Copy only contents
            } else {
                //Change parent itself and its contents
                $dest = $dest . basename($source);
                @mkdir($dest);
                chmod($dest, $options['filePermission']);
            }
        } else {
            if ($source[strlen($source) - 1] == '/') {
                //Copy parent directory with new name and all its content
                @mkdir($dest, $options['folderPermission']);
                chmod($dest, $options['filePermission']);
            } else {
                //Copy parent directory with new name and all its content
                @mkdir($dest, $options['folderPermission']);
                chmod($dest, $options['filePermission']);
            }
        }

        $dirHandle = opendir($source);
        while ($file = readdir($dirHandle)) {
            if ($file != "." && $file != "..") {
                $__dest = $dest . "/" . $file;
                $__source = $source . "/" . $file;
                //echo "$__source ||| $__dest<br />";
                if ($__source != $dest) {
                    $result = smartCopy($__source, $__dest, $options);
                }
            }
        }
        closedir($dirHandle);
    } else {
        $result = false;
    }
    return $result;
}

// Funcion que borra su contenido

function rrmdir($dir)
{
    if (is_dir($dir)) {
        $objects = scandir($dir);
        foreach ($objects as $object) {
            if ($object != "." && $object != "..") {
                if (is_dir($dir . "/" . $object)) {
                    rrmdir($dir . "/" . $object);
                } else {
                    unlink($dir . "/" . $object);
                }
            }
        }
        rmdir($dir);
    }
}