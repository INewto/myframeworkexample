<?php

/*
 * тут находятся константы, определяющие ключевые параметры системы, которые не должны изменяться
 */

define('DBASE_HOST', 'localhost'); // хост

define('DBASE_NAME', 'mamagramma'); // название базы

define('DBASE_USER', 'root'); // имя пользователя базы

define('DBASE_PASSWORD', ''); // пароль к базе

define('HOME', __DIR__); // домашняя директория

define('CONTROLLERS_PATH', dirname(__DIR__).'/app'); // директория контроллеров

define('TEMPLATES_PATH', dirname(__DIR__).'/templates'); // директория шаблонов

define('MODULES_PATH', dirname(__DIR__).'/app'); // директория модулей

define('CLASSES_PATH', dirname(__DIR__).'/classes'); // директория классов (не для автозагрузки)

define('TPL_EXT', '.tpl.php'); // расширение шаблонов