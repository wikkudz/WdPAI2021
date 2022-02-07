<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/Dish.php';
require_once __DIR__.'/../repository/DishRepository.php';
require_once __DIR__.'/../repository/IngredientRepository.php';
require_once __DIR__.'/../models/Ingredient.php';



class DishController extends AppController
{
    const MAX_FILE_SIZE = 1024*1024;
    const SUPPORTED_TYPES = ["image/png", "image/jpeg"];
    const UPLOAD_DIRECTORY = "/../public/upload/";
    private $messages = [];

    private  $dishRepository;

    public function __construct()
    {
        parent::__construct();
        $this->dishRepository = new DishRepository();
    }

    public function addDish()
    {

        if(!isset($_COOKIE['userId']) && !isset($_COOKIE['userName']) && !isset($_COOKIE['userSurname'])){
            $this->messages[] = 'You must be logged in!';
            $this->render('login',["messages" => $this ->messages]);
        }
        if ($this->isPost() && is_uploaded_file($_FILES['file']["tmp_name"]) && $this->validate($_FILES["file"])) {
            move_uploaded_file(
                $_FILES['file']["tmp_name"],
                dirname(__DIR__) . self::UPLOAD_DIRECTORY . $_FILES['file']["name"]
            );
            $image_url = self::UPLOAD_DIRECTORY . $_FILES['file']["name"];
            $dish = new Dish(
                -1,
                $_POST['title'],
                $_POST['description-text'],
                $image_url,
                $_POST['amount'],
                $_POST['time'],
                $_POST['level'],
                $_COOKIE['userName'] . " " . $_COOKIE['userSurname'],
                "0"
            );


            $this->dishRepository->addDish($dish);


            return $this->render("add-ingredients", ['dish' => $dish]);
        }

        $this->render("add-dish", ["messages" => $this->messages, 'dish']);
    }

    public function search()
    {
        $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';
        if($contentType === "application/json"){
            $content = trim(file_get_contents("php://input"));
            $decoded = json_decode($content, true);

            header('Content-type: application/json');
            http_response_code(200);

            echo json_encode($this->dishRepository->getDishByTitle($decoded['search']));
        }
    }



    public function dishes()
    {

        $dishes = $this -> dishRepository -> getDishes();
        $this->render('dishes',['dishes' => $dishes]);

    }

    private function validate(array $file): bool
    {
        if($file['size'] > self::MAX_FILE_SIZE){
            $this->messages[] = 'File is to large for destination file system.';
            return false;
        }

        if (!isset($file['type']) && !in_array($file['type'], self::SUPPORTED_TYPES)){
            $this->messages[] = 'File type is not supported.';
            return false;
        }

        return true;
    }





}