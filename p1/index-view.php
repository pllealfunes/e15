<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project 1</title>
</head>

<body>
    <h1>String Processor - E15 Project 1</h1>
    <form method='POST' action='process.php'>
        <label for='userInput'>Enter a String</label>
        <input type='text' name='userInput' id='userInput'>
        <button>Process</button>
    </form>
    <?php if (isset($userInput)) { ?>
    <h3>String</h3>
    <?php echo $userInput; ?>
    <h3>Is Palindrome?</h3>
    <?php echo $isPalindrome; ?>
    <h3>Vowel Count</h3>
    <?php echo $vowelCount; ?>
    <h3>Letter Shift</h3>
    <?php } ?>
</body>

</html>