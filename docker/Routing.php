<?php

require_once 'src/controllers/DashboardController.php';

class Router {

    public static function run(string $url){

        $controller = new DashboardController();

        if($url == 'login'){
            //todo open login html page
            $controller->login();
        }

        if($url == 'dashboard'){
            //todo open dashbord html 
            $controller->dashboard();
        }
    }
}