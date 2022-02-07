<?php

require_once 'AppController.php';
require_once __DIR__ . '/../models/User.php';
require_once __DIR__.'/../repository/UserRepository.php';

class SecurityController extends AppController
{
    private $userRepository;

    public function login(){

        $cookie_id = "userId";
        $cookie_name = "userName";
        $cookie_surname = "userSurname";


        setcookie($cookie_name,"1", time() -(1),"/");
        setcookie($cookie_id,"1", time() -(1),"/");
        setcookie($cookie_surname,"1", time() -(1),"/");


        $userRepository = new UserRepository();
        if (!$this->isPost()) {
            return $this->render('login');
        }

        $email = $_POST['email'];
        $password = hash('sha256',$_POST['password']);

        $user = $userRepository ->getUser($email);

        if (!$user){
            return $this -> render('login', ['messages' => ['User not exist!']]);
        }

        if ($user->getEmail() !== $email) {
            return $this->render('login', ['messages' => ['User with this email not exist!']]);
        }

        if ($user->getPassword() !== $password) {
            return $this->render('login', ['messages' => ['Wrong password!']]);
        }


        $cookie_id_value = $user -> getId();
        $cookie_name_value = $user -> getName();
        $cookie_surname_value = $user -> getSurname();

        setcookie($cookie_name,$cookie_name_value, time() +(86400),"/");
        setcookie($cookie_id,$cookie_id_value, time() +(86400),"/");
        setcookie($cookie_surname,$cookie_surname_value, time() +(86400),"/");

        if(!isset($_COOKIE['userId']) && !isset($_COOKIE['userName']) && !isset($_COOKIE['userSurname'])){
            $url = "http://$_SERVER[HTTP_HOST]";
            header("Location: {$url}/dishes");
        }

    }

    public function register(){

        $this ->userRepository = new UserRepository();
        if (!$this->isPost()) {
            return $this->render('register');
        }

        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirmedPassword = $_POST['confirmedPassword'];
        $name = $_POST['name'];
        $surname = $_POST['surname'];

        if($email == null){
            return $this->render('register', ['messages' => ['Pole email puste']]);
        }

        if($password == null){
            return $this->render('register', ['messages' => ['Pole haslo jest puste']]);
        }

        if ($password !== $confirmedPassword) {
            return $this->render('register', ['messages' => ['Hasla nie sa zgodne']]);
        }

        $user = new User("",$email, hash('sha256',$password), $name, $surname);

        $this-> userRepository-> addUser($user);

        return $this->render('login', ['messages' => ['You\'ve been succesfully registrated!']]);
    }

}