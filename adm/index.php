<?php
session_cache_expire(60); // define cache for session to 60 minutes
session_start();
require __DIR__.'/config.php';

// autoload do composer
require __DIR__.'/vendor/autoload.php';         

spl_autoload_register(function($class) {
    if (file_exists('controllers/'.$class.'.php')) {
       require __DIR__.'/controllers/'.$class.'.php'; 
    } elseif (file_exists('models/'.$class.'.php')) {
        require __DIR__.'/models/'.$class.'.php';
    } elseif (file_exists('core/'.$class.'.php')) {
        require __DIR__.'/core/'.$class.'.php';
    } elseif (file_exists('helpers/'.$class.'.php')) {
        require __DIR__.'/helpers/'.$class.'.php';
    }    
});

$core = new Core();
$core->run();




