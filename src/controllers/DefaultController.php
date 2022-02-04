<?php

require_once 'AppController.php';

class DefaultController extends AppController{

    public function index()
    {
        $this->render('login');

    }

    public function friends(){
        $this->render('friends');
    }

    public function dish(){
        $this->render('dish');
    }

}