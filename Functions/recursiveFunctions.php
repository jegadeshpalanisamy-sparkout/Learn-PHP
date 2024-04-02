<?php 
//nested function
function display($num)
{
    if($num<=10)
    {
        echo $num."<br> ";
        display($num+1);
    }
}
display(1);


?>