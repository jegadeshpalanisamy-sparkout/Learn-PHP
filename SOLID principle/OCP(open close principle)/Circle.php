<?php
    include "shapeInterface.php";
    class Circle implements ShapeInf{
        private $radius;
       public function __construct($r)
       {
            $this->radius=$r;
       }

       public function area()
       {
            return pi()*($this->radius * $this->radius); 
       }
    }

?>