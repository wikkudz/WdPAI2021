<?php

class Dish
{
    private $title;
    private $description;
    private $image;
    private $amount;


    private $time;
//    private $ingredients;


    public function __construct($title, $description,  $image,$amount,$time)
    {
        $this->title = $title;
        $this->description = $description;
        $this->image = $image;
        $this->amount = $amount;
        $this->time = $time;
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

    public function getAmount():int
    {
        return $this->amount;
    }

    public function setAmount(int $amount)
    {
        $this->amount = $amount;
    }


    public function getTime():int
    {
        return $this->time;
    }

    public function setTime(int $time)
    {
        $this->time = $time;
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