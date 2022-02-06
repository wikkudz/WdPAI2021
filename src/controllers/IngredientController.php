<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/Ingredient.php';
require_once __DIR__.'/../repository/IngredientRepository.php';

class IngredientController extends AppController
{
    private $ingredientRepository;

    public function __construct()
    {
        parent::__construct();
        $this->ingredientRepository = new IngredientRepository();
    }

    public function addIngredient()
    {
        if($this->isPost()){

            $ingredient = new Ingredient(
                $_POST['ingredient-name'],
                $_POST['weight'],
                $_POST['price'],
                $_POST['recipe-id']
            );
            $this->ingredientRepository->addIngredient($ingredient);

        }

        return $this ->render("add-ingredients",['dish'=>$dish]);
    }
}