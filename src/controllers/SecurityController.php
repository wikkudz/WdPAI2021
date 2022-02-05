<?php

require_once 'AppController.php';
require_once __DIR__ . '/../models/User.php';
require_once __DIR__.'/../repository/UserRepository.php';

class SecurityController extends AppController
{
    private $userRepository;

    public function login(){
        $userRepository = new UserRepository();

        if (!$this->isPost()) {
            return $this->render('login');
        }

        $email = $_POST['email'];
        $password = md5($_POST['password']);

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

        session_start();
        $_SESSION['id'] = $user ->getId();
        $_SESSION['name'] = $user -> getName();
        $_SESSION['surname'] = $user -> getSurname();

        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/dishes");
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

        $user = new User($email, md5($password), $name, $surname);

        $this-> userRepository-> addUser($user);

        return $this->render('login', ['messages' => ['You\'ve been succesfully registrated!']]);
    }

}