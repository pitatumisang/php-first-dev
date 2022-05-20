<?php
session_start();
require './boostrap.php';

if (isset($_SESSION['user'])) {
    header('Location: /feedback/index.php');
}

$username = '';
$email = '';
$password = '';
$password2 = '';

$errors = [];

$allInputsFilled = false;
$isSubmitted = false;

if (isset($_POST['submit'])) {
    //get input values
    $isSubmitted = true;

    // Getting inouts values without sanitazing

    // $username = $_POST['username'];
    // $email = $_POST['email'];
    // $password = $_POST['password'];
    // $password2 = $_POST['confirm-password'];

    // Sanitizing inputs
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_SPECIAL_CHARS);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_SPECIAL_CHARS);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS);
    $password2 = filter_input(INPUT_POST, 'confirm-password', FILTER_SANITIZE_SPECIAL_CHARS);

    if (empty($username)) {
        $errors['username'] = 'Username is required';
    }

    if (empty($email)) {
        $errors['email'] = 'Email is required';
    }

    if (empty($password)) {
        $errors['password'] = 'Password is required';
    }

    if (empty($password2)) {
        $errors['password2'] = 'Password confirmation is required';
    }

    if (count($errors) == 0) {
        $allInputsFilled = true;

        if ($password == $password2) {
            // Register a user
            $userData = [
                'username' => $username,
                'email' => $email,
                'password' => password_hash($password, PASSWORD_DEFAULT)
            ];

            $database->registerUser($userData);

            //redirect to login after registration
            header('Location: /feedback/login.php');
        } else {
            $errors['password2'] = 'Passwords do not match';
            $allInputsFilled = false;
        }
    } else {

        $allInputsFilled = false;
    }
}


// loading a view
require './views/register.view.php';
