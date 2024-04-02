<?php 
    function Car(&$name)//call be reference
    {
        $name.="black";
        echo $name;
    }
    $brand="BMW";
    Car($brand); //value was changed
    echo "<br>".$brand;

?>