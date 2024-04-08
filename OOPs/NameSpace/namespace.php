<?php 
// namespace monitor;

 use monitor\Test;
    include 'Cpu.php';
    include 'Monitor.php';


    $obj1=new cpu\Test();
    $obj1->display();

    $obj2=new Test();
    $obj2->display();
?>