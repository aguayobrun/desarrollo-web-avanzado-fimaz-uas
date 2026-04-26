<?php
//AGUAYO BRUN
spl_autoload_register(function ($class_name){
    $class_name = str_replace ('App\\' , '', $class_name);
    $class_name = str_replace ('\\', '/', $class_name);

    $file = __DIR__ . '/'. $class_name . '.php';

    if (file_exists($file)){
        require_once $file;
    }
    
});


?>