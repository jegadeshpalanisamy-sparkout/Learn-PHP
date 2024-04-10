<?php
class d{
    function dis()
    {
        echo "this is multilevel inheritance";
    }   
}
    class A extends d{
        function display()
        {
            echo 'this is parent class ';
        }
    }

    class B extends A{
        function child_display()
        {
            echo "this is child class ";
        }
    }
    

    $childObj=new B();
    $childObj->child_display();
    $childObj->display();
    $childObj->dis();
?>