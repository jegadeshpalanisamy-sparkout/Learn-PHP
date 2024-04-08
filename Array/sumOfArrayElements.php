<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="sumOfArrayElements.php" method="get">
    <label for="">How many values u need to add: <input type="text" name="input"/></label>
    <input type="submit" name="submit" value="submit"/>
</form>
     <?php
        if(isset($_GET['submit']))
        {
            $inp=$_GET['input'];
            // echo "$inp";
            echo"<form action='sumOfArrayElements.php' method='post'>";
            for($i=1;$i<=$inp;$i++)
            {
                echo"<label>Enter number: <input type='text' name='in.$i'/></label> .<br>";
            }
            echo "<input type='submit' value='submit' name='sub'/>";
            echo"</form>";

            
            if(isset($_POST['sub']))
            {
                echo "hii";
                $arr=array();
                for($i=0;$i<$inp;$i++)
                {
                    // $arr[$i]=$_POST["in.$i"];
                    $arr[$i] = $_POST['in'][$i];
                }
                
                foreach($arr as $s)
                {
                    echo $s;
                }
                
                }
                

        }
        
    ?> 
</body>
</html>