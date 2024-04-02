<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="doWhile.php" method="GET">
    <label for="">Enter number: <input type="number" name="num"/></label><br>
    <input type="submit" name="submit">

    </form>
  
    <?php
        if(isset($_GET['num']))
        {
            $rev=0;
            $ln=0;
            $n=$_GET['num'];
            do{
                $ln=$n%10;
                $rev=$rev*10+$ln;
                $n=(int)($n/10);

            }
            while($n>0);
            echo $rev;
        }
    ?>
</body>
</html>