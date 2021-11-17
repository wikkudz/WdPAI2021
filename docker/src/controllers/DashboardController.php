<?php

require_once 'AppController.php';

class DashboardController extends AppController{

    public function login(){
        $this->render('login');
    }

    public function dashboard(){

        $data = ['pizza', 'burger', 'hotdog'];

        $this-> render('dashboard', ['recipes' => $data]);
    }
}