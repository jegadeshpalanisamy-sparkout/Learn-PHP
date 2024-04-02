<?php
    function Car($color)
    {
        $color.="color";
        echo $color;
    }
    $s="red";
    Car($s);
    echo "<br>".$s;
    //cannot change value

?>