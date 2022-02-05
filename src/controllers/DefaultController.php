<?php

require_once 'AppController.php';
require_once __DIR__.'/../repository/DishRepository.php';

class DefaultController extends AppController{

    private $dishRepository;

    public function index()
    {
        $this->render('login');

    }

    public function friends(){
        $this->render('friends');
    }

    public function dish(){
        $id = $_GET['id'];
        $this ->dishRepository = new DishRepository();
        $dish = $this->dishRepository->getDish($id);
        $this->render('dish',['dish'=>$dish]);
    }

}