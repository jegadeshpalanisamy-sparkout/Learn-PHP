<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $x=5; //global scope
       
        // function globalScope(){
        //     global $x;
        //     echo"$x<br>";
        // }
        // function another()
        // {
        //     $GLOBALS;
        //     $GLOBALS['x']=$GLOBALS['x']+1;
        //     echo $GLOBALS['x'] . "<br>";
        // }
        // globalScope();
        // another();
        // echo($x);


        // function localScope()
        // {
        //     $x=5; //local scope
        //     echo"$x";
        // }
        // localScope();
        // echo"$x";

            //static variable

            function staticTest()
            {
                static $x=0;
                echo"$x <br>";
                $x++;
            }
            staticTest();
            staticTest();
            staticTest();
            
        
    ?>
</body>
</html>