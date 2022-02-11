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
    <?php echo $userInput; ?>
    <?php } ?>
</body>

</html>