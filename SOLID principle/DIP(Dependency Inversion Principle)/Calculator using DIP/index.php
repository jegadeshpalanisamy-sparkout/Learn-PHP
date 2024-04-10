<?php 
    include_once "Addition.php";
    include_once "Calculator.php";
    include_once "Subtraction.php";
    include_once "Multiplication.php";
    include_once "Division.php";
    $add=new Addition();
    $calc=new Calculator($add);
    echo "Addition:".$calc->calculate(2,4).PHP_EOL;

    $sub=new Subtraction();
    $calc1=new  Calculator($sub);
    echo "Subtraction:".$calc1->calculate(8,4).PHP_EOL;

    $mul=new Multiplication();
    $calc2=new Calculator($mul);
    echo "Multiplication:".$calc2->calculate(8,4).PHP_EOL;

    $div=new Division();
    $calc3=new Calculator($div);
    echo "Division:".$calc3->calculate(8,4).PHP_EOL;

    
    

?>