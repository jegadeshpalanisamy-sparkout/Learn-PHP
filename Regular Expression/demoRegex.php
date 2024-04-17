<?php

    $text="Hii i am from Coimbatore.This text for learning REGEX,i am quick learner";

    $pattern="/hii/i";  //i is non case sensitive

    echo preg_match($pattern,$text,$output);
    print_r($output);

    echo "<br>";
    $pattern1="/am/i";
    
    echo preg_match_all($pattern1,$text,$output2);
    print_r($output2);

    echo "<br>";
    $pattern2="/coimbatore/i";
    echo preg_replace($pattern2,"Tirupur",$text)

    
?>