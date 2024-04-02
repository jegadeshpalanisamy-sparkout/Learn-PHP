<?php
    function Sum(...$num)
    {
        $sum=0;
        foreach($num as $n)
        {
            $sum=$sum+$n;
            
        }
        return $sum;
    }

    echo Sum(1,2,3,4,5)."<br>";



    function testArg($car,...$color)
    {
        $len=count($color);
        for($i=0;$i<$len;$i++)
        {
            echo "hii this is $car color is $color[$i].<br>";
        }
    }
    testArg("BMW","red","black","blue");
?>