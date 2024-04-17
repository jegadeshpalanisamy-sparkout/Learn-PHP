<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .error{
            color:red;
        }
    </style>
</head>
<body>
    <form action="requiredValidation.php" method="post">
        Name: <input type="text" name="name">
        <span class="error">*<?php echo $nameErr; ?></span><br><br>
        E-mail: <input type="text" name="email">
        <span class="error">*<?php echo $emailErr; ?></span><br><br>
        Website: <input type="text" name="website">
        <span class="error"><?php echo $websideErr; ?></span><br><br>
        Comment: <textarea name="comment" rows="5" cols="40"></textarea><br><br>
        Genter: 
        <input type="radio" name=gender value="male">male</input>
        <input type="radio" name=gender value="female">female</input>
        <input type="radio" name=gender value="other">other</input>
        <span class="error"><?php echo $genderErr; ?></span><br><br>

        <input type="submit" value="submit"/>
    </form>
</body>
</html>