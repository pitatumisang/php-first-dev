<?php
session_start();
require './boostrap.php';

if (!isset($_SESSION['user'])) {
    header('Location: /feedback/login.php');
}

$query = parse_url($_SERVER['REQUEST_URI'], PHP_URL_QUERY);
parse_str($query, $result);

$feedbackId = (int)$result['id'];

$database->deleteOne('feedbacks', $feedbackId);

// redirect to index after deleting
header('Location: /feedback/index.php');
