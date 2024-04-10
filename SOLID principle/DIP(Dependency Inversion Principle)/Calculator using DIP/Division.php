<?php
 include_once "interfaceCalc.php";

 class Division implements CalcOperation{
    public function calculate($num1,$num2)
    {
        return $num1/$num2;
    }
 }

?>