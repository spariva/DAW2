<?php 

define('DOC_ROOT', __DIR__);



spl_autoload_register(function($class) {
    $file = str_replace("\\", DIRECTORY_SEPARATOR, $class);
    $path = DOC_ROOT . DIRECTORY_SEPARATOR . $file . ".php";
    if (file_exists($path)) {
        require $path;
    } else {
        throw new Exception("Cannot load class: $class. File not found at $path");
    }
});