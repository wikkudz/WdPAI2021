<?php

class Ingredient
{
    private $id;
    private $recipeId;
    private $name;
    private $weight;
    private $price;

    public function __construct(string $id, string $recipeId, string $name, string $weight, string $price)
    {
        $this->id = $id;
        $this->recipeId = $recipeId;
        $this->name = $name;
        $this->weight = $weight;
        $this->price = $price;
    }


    public function getName(): string
    {
        return $this->name;
    }


    public function setName($name): void
    {
        $this->name = $name;
    }

    public function getWeight(): string
    {
        return $this->weight;
    }


    public function setWeight($weight): void
    {
        $this->weight = $weight;
    }

    public function getPrice(): int
    {
        return $this->price;
    }

    public function setPrice($price): void
    {
        $this->price = $price;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function setId($id): void
    {
        $this->id = $id;
    }

    public function getRecipeId(): string
    {
        return $this->recipeId;
    }

    public function setRecipeId($recipeId): void
    {
        $this->recipeId = $recipeId;
    }


}