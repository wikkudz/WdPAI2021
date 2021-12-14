<?php

phpinfo();

require_once 'Routing.php';

$pth = trim($_SERVER['REQUEST_URI'], '/');

Router::run($pth);


