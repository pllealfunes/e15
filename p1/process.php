<?php

session_start();

//Get user input from form
$userInput = $_POST['userInput'];


/*Palindrome Logic*/

//Remove non letters from user input
$inputLettersOnly = preg_replace("/[^A-Za-z]/", '', $userInput);

//Check if palindrome by first converting to lowercase letters
$isPalindrome = strtolower($inputLettersOnly) === strrev(strtolower($inputLettersOnly)) ? 'Yes' : 'No';



/*Vowel Count Logic*/

//Remove any non vowels from the input that has first turned to lowercase
$vowelFilter = preg_replace("/[^aeiou]/",'',strtolower($inputLettersOnly));

//Find string length
$vowelCount = strlen($vowelFilter);



/*Letter Shift Logic*/

//Change user input to array
$inputArray = str_split($userInput);
$shiftLetters = "";

// Increment each letter of the array making sure that 
// lowercase or uppercase "z" only equals to a single uppercase or lowercase "a"
// non letters & other letters are simply added to the $shiftLetters variable
foreach($inputArray as $letterValue){
    if($letterValue == "z"){
        $shiftLetters .= "a";
    } else if($letterValue == "Z"){
        $shiftLetters .= "A";
    } else if(!is_numeric($letterValue)){
        $shiftLetters .= ++$letterValue;
    } else{
        $shiftLetters .= $letterValue;
    }
}


$_SESSION['results'] = [
    'userInput' => $userInput,
    'isPalindrome' => $isPalindrome,
    'vowelCount' => $vowelCount,
    'shiftLetters' => $shiftLetters
];


# Redirect
header('Location: index.php');