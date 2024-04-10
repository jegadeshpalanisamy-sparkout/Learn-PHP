<?php
 class Calculator{
    private $operation;
    public function __construct(CalcOperation $operation)
    {
        $this->operation=$operation;
    }

    public function calculate($num1,$num2)
    {
        return $this->operation->calculate($num1,$num2);
    }
 }
 

?>