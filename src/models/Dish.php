<?php

class Dish
{
    private $title;
    private $description;
    private $image;
//    private $ingredients;


    public function __construct($title, $description,  $image)
    {
        $this->title = $title;
        $this->description = $description;
        $this->image = $image;
    }


    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title)
    {
        $this->title = $title;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description)
    {
        $this->description = $description;
    }

    public function getImage(): string
    {
        return $this->image;
    }

    public function setImage(string $image)
    {
        $this->image = $image;
    }

//    public function getIngredients()
//    {
//        return $this->ingredients;
//    }
//
//    /**
//     * @param mixed $ingredients
//     */
//    public function setIngredients($ingredients)
//    {
//        $this->ingredients = $ingredients;
//    }

}