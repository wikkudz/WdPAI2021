<?php

//phpinfo();

require_once 'Routing.php';

$pth = trim($_SERVER['REQUEST_URI'], '/');
$pth = parse_url($pth, PHP_URL_PATH);

Routing::get('','DefaultController');

Routing::get('mainpage','DefaultController');
Routing::get('friends', 'DefaultController');
Routing::post('login','SecurityController');

Routing::run($pth);


