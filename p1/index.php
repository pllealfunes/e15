<?php

session_start();

if (isset($_SESSION['results'])) {
    $results = $_SESSION['results'];

    $userInput = $results['userInput'];
    $isPalindrome = $results['isPalindrome'];
    $vowelCount = $results['vowelCount'];
    $shiftLetters = $results['shiftLetters'];
    
    $_SESSION['results'] = null;
}


require 'index-view.php';