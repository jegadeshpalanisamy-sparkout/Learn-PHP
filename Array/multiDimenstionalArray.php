<?php
    $car=array(
        array("1","bmw","red"),
        array("2","audi","white"),
        array("3","honda","black")
    );
    for($row=0;$row<3;$row++)
    {
        for($col=0;$col<3;$col++)
        {
            echo $car[$row][$col]." ";
        }
        echo "<br>";
    }

?>