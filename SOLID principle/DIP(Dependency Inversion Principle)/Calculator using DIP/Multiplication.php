<?php 
    include_once "interfaceCalc.php";
    class Multiplication implements CalcOperation{
        public function calculate($num1,$num2)
        {
            return $num1*$num2;
        }
    }
?>