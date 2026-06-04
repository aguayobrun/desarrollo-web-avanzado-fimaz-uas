<?php
/* este fragmento de codigo de php esta configurando un autoloader usando la funcion `spl_autoload_register`. */

spl_autoload_register(function ($class){
    $baseDir = __DIR__ . '/../';
    $class = str_replace('\\', '/', $class);
    $parts = explode ('/', $class);
    if (!empty ($parts)){
        $parts [0] = strtolower ($parts [0]);
    }
    $file = $baseDir . implode ('/', $parts) . '.php';
    if (file_exists ($file)){
        require_once $file;
    }
});
?>