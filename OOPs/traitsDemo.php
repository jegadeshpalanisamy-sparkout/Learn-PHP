<?php
    trait firstTrait
    {
        function first()
        {
            echo "This is first trait"."<br>";
        }   
        
       
      
    }
    trait secondTrait
    {
        function second(){
            print"this is second trait"."<br>";
        }
    }
    trait thirdTraid
    {
        function third(){
            print"this is third trait";
        }
    }
    class a{
        use firstTrait,secondTrait,thirdTraid;
    }
    $obj =new a();
    $obj->first();
    $obj->second();
    $obj->third();
?>