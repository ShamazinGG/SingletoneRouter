<?php
include 'partials/header.php';
include 'users/users.php';
//spl_autoload_register(function ($class_name)
//{
//    include $class_name . '.php';
//});
include 'Router.php';
$router = Router::getInstance();
$router->parse();
include 'partials/footer.php';



