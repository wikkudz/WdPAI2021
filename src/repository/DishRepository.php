<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/Dish.php';
require_once __DIR__.'/../repository/IngredientRepository.php';
require_once __DIR__.'/../models/Ingredient.php';

class DishRepository extends Repository
{
    public function getDish(int $id): ?Dish
    {
        $stmt = $this->database->connect()->prepare('
        SELECT * FROM public.recipes WHERE id = :id
        ');

        $stmt->bindParam(':id',$id, PDO::PARAM_INT);
        $stmt->execute();

        $dish = $stmt->fetch(PDO::FETCH_ASSOC);

        if($dish == false){
            return null;
            //TODO dokonczyc
        }

        $test = new Dish(
            $dish['id'],
            $dish['title'],
            $dish['description'],
            $dish['image'],
            $dish['portions'],
            $dish['time'],
            $dish['difficulty'],
        );

        $test -> setId($dish['id']);
        var_dump($test);
        return $test;
    }

    public function addDish(Dish $dish): void
    {
        session_start();
        $date = new DateTime();
        $stmt = $this -> database->connect()->prepare('
            INSERT INTO recipes (title, description, portions, time, created_at, users_id, image, difficulty)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)
        ');


        $stmt->execute([
            $dish->getTitle(),
            $dish->getDescription(),
            $dish->getAmount(),
            $dish->getTime(),
            $date->format('Y-m-d'),
            $_SESSION['id'],
            $dish->getImage(),
            $dish->getLvl()
        ]);

        $stmt2 = $this->database->connect()->prepare('
        SELECT * FROM public.recipes WHERE title = :title
        ');

        $title = $dish->getTitle();

        $stmt2->bindParam(':title', $title, PDO::PARAM_STR);
        $stmt2->execute();

        $dish2 = $stmt2->fetch(PDO::FETCH_ASSOC);

        $dish ->setId($dish2['id']);

//        echo($dish['id']);
//        $test -> setId($dish['id']);
//        echo($test -> getId());
    }

    public function getDishes(): array
    {

        $result = [];
        $stmt = $this -> database ->connect()->prepare('
            SELECT * FROM recipes
        ');

        $stmt -> execute();
        $dishes = $stmt-> fetchAll(PDO::FETCH_ASSOC);

        foreach ($dishes as $dish){
            $result[]= new Dish(
                $dish['id'],
                $dish['title'],
                $dish['description'],
                $dish['image'],
                $dish['amount'],
                $dish['time'],
                $dish['difficulty']
            );

        }

        return $result;
    }



    public function getDishByTitle(string $searchString)
    {
        $searchString = '%'.strtolower($searchString).'%';

        $stmt = $this -> database->connect()->prepare('
            SELECT * FROM recipes WHERE LOWER(title) LIKE :search OR LOWER(description) LIKE :search
        ');

        $stmt->bindParam(':search', $searchString, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}