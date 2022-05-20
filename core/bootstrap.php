<?php
$config = require './core/config.php';
require './core/router.php';

require './database/Connection.php';
require './database/QueryBuilder.php';

require './core/functions.php';


$router = new Router;
require './core/routes.php';
require $router->direct(trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/'), $_SERVER['REQUEST_METHOD']);


