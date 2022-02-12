<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/styles.css">
    <title>Project 1</title>
</head>

<body>
    <h1>String Processor - E15 Project 1</h1>
    <form method='POST' action='process.php' class="stringForm">
        <label for='userInput'>Enter a String:</label>
        <input type='text' name='userInput' id='userInput'>
        <button>Process</button>
    </form>
    <div class="resultsContainer">
        <?php if (isset($userInput)) { ?>
        <div>
            <h2>Results</h2>
            <h3>String</h3>
            <p><?php echo $userInput; ?></p>
            <h3>Is Palindrome?</h3>
            <p><?php echo $isPalindrome; ?></p>
            <h3>Vowel Count</h3>
            <p><?php echo $vowelCount; ?></p>
            <h3>Letter Shift</h3>
            <p><?php echo $shiftLetters; ?></p>
            <?php } ?>
        </div>
    </div>
</body>

</html>