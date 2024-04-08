<?php
    class Animal{
       protected $name="jimmy";
       public $color="black";
    }
    
    class Dog extends Animal{
        function test()
        {
            echo "$this->name"."$this->color";  
        }
    }

     $obj=new Dog();
     $obj->test();
    $obj1=new Animal();
    echo $obj1->color; 
   
?>