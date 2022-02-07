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

        $stmt2 = $this->database->connect()->prepare('
        SELECT * FROM public.users WHERE id = :id_user
        ');

        $stmt2->bindParam(':id_user', $dish['users_id'], PDO::PARAM_STR);
        $stmt2->execute();

        $dish2 = $stmt2->fetch(PDO::FETCH_ASSOC);

        $stmt3 = $this->database->connect()->prepare('
        SELECT sum(price) FROM public.ingredients WHERE recipe_id = :recipe_id
        ');

        $stmt3->bindParam(':recipe_id', $dish['id'], PDO::PARAM_INT);
        $stmt3->execute();

        $price = $stmt3->fetch(PDO::FETCH_ASSOC);

        $stmt4 = $this -> database->connect()->prepare('
            UPDATE recipes SET price = :p where id = :recipe_id
        ');

        $stmt4->bindParam(':recipe_id', $dish['id'], PDO::PARAM_INT);
        $stmt4->bindParam(':p', $price['sum'], PDO::PARAM_INT);

        $stmt4->execute();


        if($dish == false){
            return null;
            //TODO dokonczyc
        }


        return new Dish(
            $dish['id'],
            $dish['title'],
            $dish['description'],
            $dish['image'],
            $dish['portions'],
            $dish['time'],
            $dish['difficulty'],
            $dish2['name']." ".$dish2['surname'],
            $price['sum']
        );

    }

    public function addDish(Dish $dish): void
    {
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
            $_COOKIE['userId'],
            $dish->getImage(),
            $dish->getLvl(),
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

            $stmt2 = $this->database->connect()->prepare('
                SELECT * FROM public.users WHERE id = :id_user
            ');

            $stmt2->bindParam(':id_user', $dish['users_id'], PDO::PARAM_STR);
            $stmt2->execute();

            $dish2 = $stmt2->fetch(PDO::FETCH_ASSOC);

            $stmt3 = $this->database->connect()->prepare('
                SELECT sum(price) FROM public.ingredients WHERE recipe_id = :recipe_id
            ');

            $stmt3->bindParam(':recipe_id', $dish['id'], PDO::PARAM_INT);
            $stmt3->execute();


            $result[]= new Dish(
                $dish['id'],
                $dish['title'],
                $dish['description'],
                $dish['image'],
                $dish['amount'],
                $dish['time'],
                $dish['difficulty'],
                $dish2['name']." ".$dish2['surname'],
                $dish['price']
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
        $dishes = $stmt->fetchAll(PDO::FETCH_ASSOC);



        foreach ($dishes as $dish){
            $stmt2 = $this->database->connect()->prepare('
                SELECT * FROM public.users WHERE id = :id_user
            ');

            $stmt2->bindParam(':id_user', $dish['users_id'], PDO::PARAM_STR);
            $stmt2->execute();
            $user = $stmt2->fetch(PDO::FETCH_ASSOC);
            $dish['users_id'] = $user['name'].$user["surname"];
        }

        return $dishes;
    }


}