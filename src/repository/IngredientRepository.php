<?php
require_once 'Repository.php';
require_once __DIR__.'/../models/Ingredient.php';

class IngredientRepository extends Repository
{

    public function addIngredient(Ingredient $ingredient){
        $stmt = $this -> database->connect()->prepare('
            INSERT INTO ingredients (name, weight, price, recipe_id)
            VALUES (?, ?, ?, ?)
        ');

        $stmt->execute([
            $ingredient->getName(),
            $ingredient->getWeight(),
            $ingredient->getPrice(),
            (int)$ingredient->getRecipeId()
        ]);
    }


}