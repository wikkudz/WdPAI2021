<?php

class Dish
{
    private $title;
    private $description;
    private $image;
    private $amount;
    private $time;
    private $lvl;
    private $id;
    private $user;
    private $price;

    public function __construct($id, $title, $description, $image,$amount,$time, $lvl,$user,$price = "-1")
    {
        $this->id = $id;
        $this->title = $title;
        $this->description = $description;
        $this->image = $image;
        $this->amount = $amount;
        $this->time = $time;
        $this->lvl=$lvl;
        $this->user=$user;
        $this->price = $price;
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

    public function getLvl(): string
    {
        return $this->lvl;
    }

    public function setLvl(string $lvl): void
    {
        $this->lvl = $lvl;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function setPrice($price): void
    {
        $this->price = $price;
    }


    public function getUser(): string
    {
        return $this->user;
    }

    public function setUser($user): void
    {
        $this->user = $user;
    }


    public function setId($id): void
    {
        $this->id = $id;
    }

    public function getId(): int
    {
        return $this->id;
    }



}