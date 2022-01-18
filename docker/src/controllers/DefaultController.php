<?php

require_once 'AppController.php';

class DefaultController extends AppController{

    public function index()
    {
        $this->render('login');

    }

    public function mainpage()
    {
        $this->render('main-page');
    }

    public function friends(){
        $this->render('friends');
    }
}