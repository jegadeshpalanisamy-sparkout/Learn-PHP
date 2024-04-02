<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="ifElseLadder.php" method="GET">
        <h3>Find biggest of three</h3>
        <label for="n1">Enter a=<input type="text" name="n1"></label><br>
        <label for="n2">Enter b=<input type="text" name="n2"></label><br>
        <label for="n3">Enter c=<input type="text" name="n3"></label><br>
        <input type="submit" name="btn" value="hi">
    </form>
    <h1>
    <?php
        
        if(isset($_GET["btn"]))
        {
            $A=$_GET['n1'];
            $B=$_GET['n2'];
            $C=$_GET['n3'];
            if($A>$B && $A>$C)
            {
                echo "A is biggest";
            }
            else if($B>$A && $B>$C)
            {
                echo "B is biggest";
            }
            else{
                echo "C is biggest";
            }
       
        }
        ?>
      
    </h1>
    
</body>
</html>