<?php

session_start();

$userInput = $_POST['userInput'];

$_SESSION['results'] = [
    'userInput' => $userInput
];

//$correct = $answer == 'pumpkin';

# Redirect
header('Location: index.php');