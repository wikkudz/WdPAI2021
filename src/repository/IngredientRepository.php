<?php
require_once 'Repository.php';
require_once __DIR__.'/../models/Ingredient.php';

class IngredientRepository extends Repository
{

    public function addIngredient(Ingredient $ingredient){
        $stmt = $this -> database->connect()->prepare('
            INSERT INTO ingredients (weight, price, recipes_id)
            VALUES (?, ?, ?)
        ');

        $stmt->execute([
            $ingredient->getWeight(),
            $ingredient->getPrice(),
            $ingredient->getRecipeId()
        ]);
    }
}