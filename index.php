<?php

// FRONT CONTROLLER


// отображение ошибок

ini_set('display_errors',1);
error_reporting (E_ALL);

session_start();

// подключение файлов системы

define('ROOT', dirname(__FILE__));
require_once (ROOT.'/components/Autoload.php');



//вызов Router
$router = new Router();
$router->run();