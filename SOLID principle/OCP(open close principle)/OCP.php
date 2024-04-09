<?php
    include "./Circle.php";
    include "./Square.php";
    

    class AreaCalculator{
        public function calcTotalArea(array $shapes)
        {
            $totalArea=0;
            foreach($shapes as $s)
            {
                $totalArea+=$s->area();
                return $totalArea;
            }
            
        }
    }

    $circle=new Circle(5);
    $square=new Square(4);
    $shapeArr=[$circle,$square];
    $tolAreaCalc=new AreaCalculator();
    echo "Total Area:".$tolAreaCalc->calcTotalArea($shapeArr);

    

    


?>