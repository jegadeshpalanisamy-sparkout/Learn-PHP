<?php
include "shapeInterface.php";
    class Square implements ShapeInf{
        private $side;
        function __construct($s)
        {
            $this->side=$s;
        }
        public function area()
        {
           return $this->side * $this->side;
        }
    }

?>