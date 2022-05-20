<?php
session_start();
require './boostrap.php';

if (!isset($_SESSION['user'])) {
    header('Location: /feedback/login.php');
}

$allInputsFilled = false;
$isSubmitted = false;

$newFeedback = '';
$errors = [];

$query = parse_url($_SERVER['REQUEST_URI'], PHP_URL_QUERY);
parse_str($query, $result);

$feedbackId = (int)$result['id'];

$feedback = $database->select('feedbacks', $feedbackId);

if (isset($_POST['submit'])) {

    $isSubmitted =  true;

    $newFeedback = filter_input(INPUT_POST, 'body', FILTER_SANITIZE_SPECIAL_CHARS);

    if (!empty($newFeedback)) {

        $allInputsFilled = true;

        if ($feedback->body == $newFeedback && $isSubmitted) {
            $errors['feedback'] = 'Feedback not updated';
        } else {
            $database->updateOne($feedbackId, $newFeedback);
            header('Location: /feedback/index.php');
        }
    }
}



// load a view
require './views/update.view.php';
