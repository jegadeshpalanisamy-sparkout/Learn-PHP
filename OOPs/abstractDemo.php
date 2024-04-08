<?php 
  abstract class Demo{
    public function Apple()
    {
        echo 'color is red';
    }
    abstract public function Orange(); 
}

class child1 extends Demo{
     public function Orange()
    {
        echo 'color is orange';
    }
}

$obj= new child1();
$obj->Orange();
$obj->Apple();
?>