<?php 
    function test($name)
    {
        return $name;
    }
    echo test("hello");


    function odd($num)
    {
        if($num%2!=0)
        {
           
            return " <br>.odd number";
        }
        else
            return " <br>.even number";
    }
    echo odd(7);
?>