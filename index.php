<?php

//phpinfo();

require_once 'Routing.php';

$pth = trim($_SERVER['REQUEST_URI'], '/');
$pth = parse_url($pth, PHP_URL_PATH);

Routing::get('','DefaultController');

Routing::get('dishes','DishController');
Routing::get('friends', 'DefaultController');
Routing::get('dish', 'DefaultController');
Routing::post('addDish', 'DishController');
Routing::post('login','SecurityController');
Routing::post('register','SecurityController');
Routing::post('searchDish', 'DishController');

Routing::run($pth);


