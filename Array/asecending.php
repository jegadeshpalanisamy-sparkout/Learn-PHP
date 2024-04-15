<?php
    $arr=array(5,4,3,2,1);

    for($i=0;$i<count($arr);$i++)
    {
        for($j=$i+1;$j<count($arr);$j++)
        {
            if($arr[$i]>$arr[$j])
            {
                $temp=$arr[$i];
                $arr[$i]=$arr[$j];
                $arr[$j]=$temp;


            }
        }
    }
    print_r($arr);
    
?>