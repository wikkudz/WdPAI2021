<?php

require_once 'AppController.php';
require_once __DIR__.'/../repository/DishRepository.php';
require_once __DIR__.'/../repository/IngredientRepository.php';


class DefaultController extends AppController{

    private $dishRepository;

    public function index()
    {
        $this->render('login');

    }

    public function friends(){
        $this->render('friends');
    }

    public function profile(){
        $this->render('profile');
    }
    public function dish(){
        $id = $_GET['id'];
        $this ->dishRepository = new DishRepository();
        $this ->ingredientRepository = new IngredientRepository();
        $dish = $this->dishRepository->getDish($id);
        $ingredients = $this-> ingredientRepository ->getIngredients($id);
        $this->render('dish',['dish'=>$dish, 'ingredients' => $ingredients]);
    }

}