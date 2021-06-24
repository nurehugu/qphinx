<?php
ini_set('display_errors', 1);
error_reporting(E_ALL ^ E_DEPRECATED);

/**
 * Attempts to load Composer's autoload.php as either a dependency or a
 * stand-alone package.
 *
 * @return bool
 */
return function () {
    $file = '/var/www/vendor/autoload.php';
    if (is_file($file)) {
        require_once $file;
        return true;
    }
    var_dump("Not found $file!");
    return false;
};
