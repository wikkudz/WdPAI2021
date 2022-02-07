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

    public function getIngredients($recipe_id): array
    {

        $result = [];
        $stmt = $this -> database ->connect()->prepare('
            SELECT * FROM ingredients WHERE recipe_id = :recipe_id
        ');

        $stmt->bindParam(':recipe_id',$recipe_id, PDO::PARAM_INT);
        $stmt->execute();

        $ingredients = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($ingredients as $ingredient){
            $result[] = new Ingredient(
                $ingredient['name'],
                $ingredient['weight'],
                $ingredient['price'],
                $ingredient['recipe_id']
            );

        }

        return $result;
    }

    public function addIngredients(array $ingredients){
        foreach($ingredients as $ingredient){
            $stmt = $this -> database->connect()->prepare('
            INSERT INTO ingredients (name, weight, price, recipe_id)
            VALUES (?, ?, ?, ?)
        ');
            $stmt->execute([
                $ingredient->getName(),
                $ingredient->getWeight(),
                str_replace(",",".",$ingredient->getPrice()),
                (int)$ingredient->getRecipeId()
            ]);
        }

    }
}