<?php

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

// указываем кодировку
header("Content-Type: text/html; charset=utf-8");

// подключаем конфиг (неизменные параметры системы)
require_once("includes/config.php");

// подключение класса работы с базой
require_once(CLASSES_PATH."/Dbase.php");

// подключение к базе
Dbase::connect();
Dbase::dbQuery("SET NAMES 'utf8'"); 
Dbase::dbQuery("SET CHARACTER SET 'utf8'");
Dbase::dbQuery("SET SESSION collation_connection = 'utf8_general_ci'");

// библиотека независимых функций
require_once("includes/universal_functions.php");

// автозагрузка классов
spl_autoload_register(
    function($class_name) 
    {
        require_once(__DIR__."/classes/autoload/{$class_name}.php");
    }
);

// запускаем сессию
session_start();

Config::getConfig();

// подключение текущего контроллера
$plug_controller = new PlugController();
$plug_controller -> plug();
