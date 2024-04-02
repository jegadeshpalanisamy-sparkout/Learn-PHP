<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="ifElse.php" method="post" >
    <h2>checking number for odd or even</h2>
    <label>Enter number:<input type="text" name="num" /></label>
   <input type="submit">
</form>
   
</body>

</html>
<?php
     $num=$_POST["num"];
    // extract($_GET);
    // echo $num;
    if($num%2==0)
    {
        echo "Even number";
    }
    else{
        echo "Odd number";
    }
          
          ?>