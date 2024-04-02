<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="forLoop.php" method="post">
        <label for="" >Enter String: <input type="text" name="s"/></label><br>
       
        
        <input type="submit" name="submit"/>
    </form>
    <?php 
         extract($_POST);
        if(isset($submit))
        {
           
            $s1=$s;
            $ch="";
            for($i=strlen($s)-1;$i>=0;$i--)
            {
                $ch=$ch.$s[$i];

            }
            
            if(strcmp($s1,$ch)==0)
            {
                echo "Given string is palindrome";
            }
            else
            {
                echo "Not a palindrome";
            }

        }
    ?>
</body>
</html>