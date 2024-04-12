<?php
    $arr=array(1,2,2,1,3,4,3);
    $arrNew=array();
   
    $prevElement=null;
    foreach($arr as $temp)
    {
        if($temp != $prevElement)
        {
            $arrNew[]=$temp;
        }
        $prevElement=$temp;
    }
    print_r($arrNew);
?>