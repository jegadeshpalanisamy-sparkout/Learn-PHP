<?php 
include_once "interfaceCalc.php";
    class Addition implements CalcOperation{
        public function calculate($num1,$num2){
            return $num1 + $num2;
        }
    }
?>