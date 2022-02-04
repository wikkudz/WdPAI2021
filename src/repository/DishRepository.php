<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/Dish.php';

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

        return new Dish(
            $dish['title'],
            $dish['description'],
            $dish['image'],
            $dish['amount'],
            $dish['time'],
            $dish['difficulty']
        );
    }

    public function addDish(Dish $dish): void
    {
        $date = new DateTime();
        $stmt = $this -> database->connect()->prepare('
            INSERT INTO recipes (title, description, portions, time, created_at, users_id, image, difficulty)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)
        ');

        $assignedById = 1;

        $stmt->execute([
            $dish->getTitle(),
            $dish->getDescription(),
            $dish->getAmount(),
            $dish->getTime(),
            $date->format('Y-m-d'),
            $assignedById,
            $dish->getImage(),
            $dish->getLvl()
        ]);
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
}