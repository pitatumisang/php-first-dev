<?php
session_start();
require './boostrap.php';

if (!isset($_SESSION['user'])) {
    header('Location: /feedback/login.php');
}

$body = '';
$errors = [];


if (isset($_POST['submit'])) {

    // $body = $_POST['body'];

    $body = filter_input(INPUT_POST, 'body', FILTER_SANITIZE_SPECIAL_CHARS);

    // saving the feedback to database
    if (!empty($body)) {

        $data = [
            'userId' => $_SESSION['user']->id,
            'body' => $body
        ];

        // database variable come from bootstrap.php
        $database->insertOne('feedbacks', $data);

        header('Location: /feedback/index.php');
    } else {
        $errors['feedback'] = 'Feedback is required';
    }
}

require './views/create_feedback.view.php';
