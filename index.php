<?php
session_start();
require './boostrap.php';


// $feedbacks = $database->selectAll('feedbacks');
$feedbackData = $database->selectAllWithCreators();

// Trasform feedback data to include user 
// foreach ($feedbacks as $feedback) {

//     $username = $database->getFeedbackCreator($feedback->userId)->username;

//     array_push($feedbackData, [
//         'username' => $username,
//         'body' => $feedback->body,
//         "createdAt" => $feedback->createdAt
//     ]);
// }

require './views/index.view.php';
