
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
        session_start();

        $_SESSION["Name"]="jega";
        $_SESSION["Age"]=21;

        echo $_SESSION["Name"];
        echo $_SESSION["Age"];
        // session_unset();

        //session_destroy();
    ?>
    
</body>
</html>