<?php
use core\Router;

spl_autoload_register(function ($class) {
    $path = str_replace('\\', '/', $class . '.php');
    if (file_exists($path)) {
        require $path;
    }
});

session_start();
if (!isset($_SESSION['lang'])) $_SESSION['lang'] = 'rus';
$lang = 'languages/' . $_SESSION['lang'] . '.php';
require $lang;
$router = new Router;
$router->start();
