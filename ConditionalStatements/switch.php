<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="switch.php" method="GET">
        <label for="">Enter number=<input type="text" name="n"></label>
        <input type="submit" name="hi"/>
    </form>

    <h3>
        <?php
        if(isset($_GET["hi"]))
        {
            $checking=$_GET['n'];
            switch($checking)
            {
                case 1:
                    echo "sunday";
                    break;
                case 2:
                    echo 'monday';
                    break;
                case 3:
                    echo "tuesday";
                    break;
                case 4:
                    echo "wednesday";
                    break;
                case 5:
                    echo "thursday";
                    break;
                case 6:
                    echo "friday";
                    break;
                case 7:
                    echo 'saturday';
                    break;
                default:
                    echo 'enter 1 to 7 ';

            }
        }
           
        ?>
    </h3>
</body>
</html>