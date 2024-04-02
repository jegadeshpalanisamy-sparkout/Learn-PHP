<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="whileLoop.php" method="get">
        <label for="">Enter any string: <input type="text" name="str"></label>
        <input type="submit" name="btn"/>
    </form>

    <?php
        if(isset($_GET['btn']))
        {
            $str=$_GET['str'];
            
            $i=strlen($str)-1;
            $ch=" ";
            while($i>=0)
            {
                $ch=$ch.$str[$i];
              
                $i--;
            }
            echo $ch;
           
        }
    ?>
</body>
</html>