<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sort an array Asending or descending</title>
    <style>
        .margin{
            margin-top:5px;
        }
    </style>
</head>
<body align="center">
    <form action="<?php $_SERVER['PHP_SELF']?>" method="post">
        <div>
            <label for="" >How many values do you arrange in array:<input type="text" name="n"/></label>
        </div>
        <div>
            <br>
            <input type="submit" name="input"/>
        </div>

    </form>

    <?php
    
        $arr=array();
        
        if(isset($_REQUEST['input']))
        {
            $_SESSION['input']=$_REQUEST['n'];
            $input=$_REQUEST['n'];
            for($i=0;$i<$input;$i++)
            {   echo "<br>";
                echo "<form class='margin' action='' method='post'>";
                echo "<input type='text' placeholder='enter value $i' name='v$i' class='margin' />";
            }
            echo"<br>";
            echo "<input type='submit' name='submit' value='submit' class='margin'/>";
        }

        if(isset($_REQUEST['submit']))
        {
           
            for($i=0;$i<$_SESSION['input'];$i++)
            {
                if(isset($_POST["v$i"]))
                {
                    array_push($arr,$_POST["v$i"]);
                    sort($arr);
                    $asc=$arr;
                    rsort($arr);
                    $dsc=$arr;

                }
                
               
               
                
            }
            echo "<h4>Ascending Array: </h4>";
            print_r($asc);
            echo "<h4>Decending Array: </h4>";
            print_r($dsc); 
            
        }

    
    ?>
   
</body>
</html>