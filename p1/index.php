<?php

session_start();

if (isset($_SESSION['results'])) {
    $results = $_SESSION['results'];

    $userInput = $results['userInput'];
    //$correct = $results['correct'];

    $_SESSION['results'] = null;
}


require 'index-view.php';