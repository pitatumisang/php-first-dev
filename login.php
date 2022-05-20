<?php
session_start();
require './boostrap.php';

if (isset($_SESSION['user'])) {
    header('Location: /feedback/index.php');
}


$email = '';
$password = '';
$errors = [];

$allInputsFilled = false;
$isSubmitted = false;

if (isset($_POST['submit'])) {
    $isSubmitted = true;
    //get input values

    // Getting input values without sanitazing

    // $email = $_POST['email'];
    // $password = $_POST['password'];

    //Getting input values with sanitazation
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_SPECIAL_CHARS);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS);


    if (empty($email)) {
        $errors['email'] = 'Email is required';
    }

    if (empty($password)) {
        $errors['password'] = 'Password is required';
    }

    if (count($errors) == 0) {
        $allInputsFilled = true;

        //login the user
        $user = $database->logInUser($email);

        if ($user && password_verify($password, $user->password)) {
            // set a session with user
            $_SESSION['user'] = $user;
            //redirect to login after registration
            header('Location: /feedback/index.php');
        } else {
            $errors['credentials'] = 'Wrong credentials, please check your email or password!';
            $allInputsFilled = false;
        }
    } else {
        $allInputsFilled = false;
    }
}


// loading a view
require './views/login.view.php';
