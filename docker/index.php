<?php

//phpinfo();

require_once 'Routing.php';

$pth = trim($_SERVER['REQUEST_URI'], '/');
$pth = parse_url($pth, PHP_URL_PATH);

Routing::get('login','DefaultController');
Routing::get('mainpage','DefaultController');
Routing::run($pth);


