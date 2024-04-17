<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="validation.php" method="post">
        Name: <input type="text" name="name"><br><br>
        E-mail: <input type="text" name="email"><br><br>
        Website: <input type="text" name="website"><br><br>
        Comment: <textarea name="comment" rows="5" cols="40"></textarea><br><br>
        Genter: 
        <input type="radio" name=gender value="male">male</input>
        <input type="radio" name=gender value="female">female</input>
        <input type="radio" name=gender value="other">other</input><br><br>

        <input type="submit" value="submit"/>
    </form>
</body>
</html>