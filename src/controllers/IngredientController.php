<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/Ingredient.php';
require_once __DIR__.'/../repository/IngredientRepository.php';
require_once __DIR__.'/../repository/DishRepository.php';

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
            $ingredients = [];

            $i = 0;
            while(isset($_POST['ingredient-name'.$i])){
                $ingredients[$i] = new Ingredient(
                    $_POST['ingredient-name'.$i],
                    $_POST['weight'.$i],
                    $_POST['price'.$i],
                    $_POST['recipe-id']
                );
                $i++;
            }
            $this->ingredientRepository->addIngredients($ingredients);
        }

        $dish = new DishRepository();

        $this->render("dish",["ingredients" => $ingredients, "dish" => $dish->getDish($_POST['recipe-id'])]);
    }

    public function ingredients($recipe_id)
    {
        $ingredients = $this -> ingredientsRepository -> getIngredients($recipe_id);

        $this->render('dish',['ingredients' => $ingredients]);

    }
}