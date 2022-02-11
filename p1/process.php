<?php

session_start();

//Get user input from form
$userInput = $_POST['userInput'];

//Checking if input is palindrome

//Remove non letters from user input
$inputLettersOnly = preg_replace("/[^A-Za-z0-9 ]/", '', $userInput);

//Check if palindrome by first converting to lowercase letters
$isPalindrome = strtolower($inputLettersOnly) == strrev(strtolower($inputLettersOnly)) ? 'Yes' : 'No';

$_SESSION['results'] = [
    'userInput' => $userInput,
    'isPalindrome' => $isPalindrome,
    'vowelCount' => $vowelCount,
];

//$correct = $answer == 'pumpkin';

# Redirect
header('Location: index.php');