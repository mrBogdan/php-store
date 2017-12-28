<?php

spl_autoload_register(function ($class) {
    
        $array_path = array(
            '/models/',
            '/components/',
        );

        foreach ($array_path as $path) {
            $path = ROOT . $path . $class . '.php';
            if (is_file($path)) {
                include_once $path;
            }
        }
});
